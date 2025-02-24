let dataTest = [
    { 
        "create_at": "2025-01-13 15:54:12", 
        "status": "create", 
        "comment": "", 
        "id": 1 
    },
    { 
        "create_at": "2025-01-12 15:54:12", 
        "status": "update", 
        "comment": "Подтверждён", 
        "id": 2 
    },
    { 
        "create_at": "2025-01-13 12:54:12", 
        "status": "fin", 
        "comment": "", 
        "id": 3 
    }
];

$(document).ready(function () {
    let data = getDataTebleStandart();
    data.data = dataTest;
    data.columns = [
        { 
            data: 'create_at', 
            title: "Дата",
            searchable: true, 
            orderable: true, 
        },
        { 
            data: 'status',
            title: "Статус",
            searchable: true, 
            orderable: true, 
            render: function (data, type, row) {
                switch(data){
                    case "create":
                        return "<p>Создан</p>";
                        break;
                    case "update":
                        return "<p>Обновлён</p>";
                        break;
                    case "fin":
                        return "<p>Получен</p>";
                        break;
                    default:
                        return "";
                        break;
                }
            }
        },
        { 
            data: 'comment', 
            title: "Коментарий",
            searchable: true, 
            orderable: true, 
        },
        // {
        //     data: 'id', searchable: true, orderable: true,
        //     render: function (data, type, row) {
        //         return '<button class="delete-button" data-id="' + data + '">Удалить</button>';
        //     }
        // }
    ];
    console.log(data);
    let table = $("#order__tabel").DataTable(data);
});
