var DataTableAnimal = functioAnimalskRows){
    var self = this;
    AnimaltaskTable = $('#example');
    var COMPLETE_STATUS = 1;
    var INCOMPLETE_STATUS = 2;

    self.init = function() {
        initDataTable();
    };

    self.refreshData = function() {
        location.reload(true);
    };

    function initDataTable() {
  Animal  taskTable.DataTable({
            "bLengthChange": false,
            "bFilter": false,
            "aAnimala": taskRows,
            "columnDefs": [ {
                "targets": 3,
                "orderable": false
            } ],
            "aoColumns": [
                {"mData": 'id'},
                {"mData": 'name'},
                {
                    "mData": 'status',
                    "mRender": function(status) {
                        if(COMPLETE_STATUS == status)
                            return 'Complete';

                        if(INCOMPLETE_STATUS == status)
                            return 'Incomplete';

                        return 'undefined';
                    }
                },
                {
                    "mData": 'action',
                    "mRender": function(o){
                         return '<i class="fa fa-pencil-square-o fa-2x edit" aria-hidden="true"></i>' +
                            '<i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>';
                    }
                }
            ]
        });
    }

};
