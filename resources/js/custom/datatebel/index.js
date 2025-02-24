// https://datatables.net/download/npm
import DataTable from "datatables.net-dt";
import  'datatables.net-responsive-dt';

import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css';
import './index.scss';

window.DataTable = DataTable;

window.getDataTebleStandart = function() {
    return {
        responsive: true,
        searchDelay: 500,
        processing: true,
        order: [0, 'desc'],
        lengthMenu: [
            [15, 30, 45, -1],
            ["15 строк", "30 строк",
                "45 строк", "Все"
            ]
        ],
        // sDom: '<"dataTables__top"flB>rt<"dataTables__bottom"ip><"clear">',
        columnDefs: [
            {
                targets: -1,
                className: 'dt-body-right'
            },
            {
                targets: 0,
                 className: 'dt-body-left'
                  }
          ],
        // data: dataTest,
        // serverSide: true,
        // ajax: {
        //     url: "/administrator/companies",
        //     type: "POST"
        // },

        
        // columns: [
        //     { data: 'name', searchable: true, orderable: true, },
        //     { data: 'age', searchable: true, orderable: true, },
        //     { data: 'city', searchable: true, orderable: true, },
        //     {
        //         data: 'id', searchable: true, orderable: true,
        //         render: function (td, cellData, rowData, row, col) {
        //             return '<button class="delete-button" data-id="' + cellData + '">Удалить</button>';
        //         }
        //     }
        // ],
        "language": {
            "searchPlaceholder": "Поиск записей...",
            "processing": "Подождите...",
            "search": "Поиск:",
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Записи с _START_ по _END_ из _TOTAL_ записей",
            "infoEmpty": "Записи с 0 до 0 из 0 записей",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "infoPostFix": "",
            "loadingRecords": "Загрузка записей...",
            "zeroRecords": "Записи отсутствуют.",
            "emptyTable": "В таблице отсутствуют данные",
            "paginate": {
                "first": "Первая",
                "previous": "Предыдущая",
                "next": "Следующая",
                "last": "Последняя"
            },
            "aria": {
                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                "sortDescending": ": активировать для сортировки столбца по убыванию"
            }
        }

    };
}