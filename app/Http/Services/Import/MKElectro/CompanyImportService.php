<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\Services\Media\Base64MediaService;
use App\Models\Company\Company;
use Illuminate\Support\Facades\DB;

class CompanyImportService extends MKElectroImportService
{
    public $limit = 10;
    public $offset = 0;
    public function start()
    {
        $this->write("");
        $this->write("Создание компаний");

        $mediaService = (new Base64MediaService);
        $mediaService->maxWidth = Company::MAX_WIDTH;
        $mediaService->maxHeight = Company::MAX_HEIGHT;

        //

        while (true) {
            $companies = $this->api->getCompanies($this->limit, $this->offset);
            dump($companies);
            if (!$companies) {
                dump("Не удалось получить компании");
                break;
            }

            foreach ($companies as $company) {
                DB::beginTransaction();
                try {
                    if (!$company["slug"]) {
                        throw new \Exception("Не найдены важные данные");
                    }
                    if (Company::where('slug', $company["slug"])->exists()) {
                        throw new \Exception("{$company["slug"]} уже существует");
                    }

                    $c = new Company();
                    $c->fill([
                        'name' => $company["mf_name"],
                        'slug' => $company["slug"],
                        'is_on' => $company["published"],
                        'description' => (isset($company["mf_desc"]) && $company["mf_desc"] != "" ? strip_tags(str_replace(['&#13;&#10;', '&#13;', '&#10;'], '', $company["mf_desc"])) : null),
                    ]);
                    $c->save();

                    if (isset($company["file_name"]) || isset($company["file"])) {
                        $name = $mediaService->create(Company::PATH_PREVIEW, $company["file"]);
                        if ($name) {
                            $c->preview = $name;
                            $c->save();
                        }
                    }

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    $this->error($e->getMessage());
                }
            }

            $this->offset += $this->limit;
        }
    }
}
