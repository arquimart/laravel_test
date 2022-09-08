<template>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover" id="usersData" width="100%">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                </thead>
            </table>
        </div>
    </div>
</template>
<script>
    export default
    {
        mounted()
        {
            console.log('Component mounted.');
            var table = $("#usersData").DataTable();
            table.destroy();
            var table = $("#usersData").DataTable(
            {
                keys: true,
                order: [],
                pageLength: 100,
                deferRender: true,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todas"]],
                processing: true,
                serverSide: true,
                ajax: "getUsers",
                columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'}
                ],
                "language":
                {
                    "url": "/DataTables/lang/Spanish.json"
                },
                colReorder: true,
                dom: 'rlBfpitip',
                buttons:
                [
                { extend: 'colvis', text: 'Columnas'},
                { extend: 'copy', text: 'Copiar' },
                { extend: 'print', text: 'Imprimir' },
                'excel', 'pdf'
                ]
            });
        }
    }
</script>