var AnimalManager = function(dataTableAnimal){
    var self = this;
    var URL_INSERT_Animal = 'http://tiempo.webchallange.com/Animal/Animalclient/insert';
    var URL_UPDATE_Animal = 'http://tiempo.webchallange.com/Animal/Animalclient/update';
    var URL_DELETE_Animal = 'http://tiempo.webchallange.com/Animal/Animalclient/delete';
    self.init = function() {
        bindUIActions();
        dataTableAnimal.init();
    };

    function getSettings() {
        return {
            //$saveButton: $("#send-Animal"),
            $saveButton: $("#send"),
            $updateButton: $("#send-Animal"),
            $AnimalForm: $("#AnimalForm"),
            //$updateButton: $(".edit"),
            $deleteButton: $(".delete"),
            ajax: {
                type: "",
                url: "",
                data: {},
                dataType: "json",
                async: true,
                contentType: "application/json; charset=utf-8",
                success: {},
                error: ajaxError
            }
        }
    }

    function bindUIActions() {
        var settings = getSettings();
        console.log(settings.$updateButton);
        settings.$saveButton.on("click", save);
        settings.$updateButton.on("click", update);

    }

    function save() {
        var settings = getSettings();
        var ajaxSettings = settings.ajax;
        var name = $("#name").val();
        var status= $("#status").val();

        ajaxSettings.type = "POST";
        ajaxSettings.data = {name: name,status: status};
        ajaxSettings.url = URL_INSERT_Animal;
        ajaxSettings.success = dataTableAnimal.refreshData;

        $.ajax(ajaxSettings);
    }

    function update() {
        var settings = getSettings();
        var ajaxSettings = settings.ajax;
        var name = $("#name").val();
        var status = $("#status").val();
        var id = $("#id").val();

        ajaxSettings.type = "POST";
        ajaxSettings.data = {id:1,name: "dany", status:1};
        ajaxSettings.url = URL_UPDATE_Animal;
        ajaxSettings.success = dataTableAnimal.refreshData();

        $.ajax(ajaxSettings);
    }

    function del() {
        var settings = getSettings();
        var ajaxSettings = settings.ajax;
        var name = $("#name").val();
        var status = $("#status").val();
        var id = $("#id").val();

        ajaxSettings.type = "PUT";
        ajaxSettings.data = {id:id,name: name, status:status};
        ajaxSettings.url = URL_DELETE_Animal;
        ajaxSettings.success = dataTableAnimal.refreshData();

        $.ajax(ajaxSettings);
    }

    function ajaxError() {
        console.log('Something goes wrong');
    }
};

