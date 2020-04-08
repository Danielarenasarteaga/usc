$(function() {
    $("#divConfiguration").addClass("active");
    $("#divUser").addClass("active");
    var pathURL = "users";
    var grid;
    var currentId = 0;

    function divModalErrorShow(errorMsg) {
        $("#divModalError").html(errorMsg);
        $("#divModalError").show(500);

        setTimeout(function() {
            $("#divModalError").hide(500);
        }, 5000);
    }

    function store() {
        $("#loading").show();
        $.post(pathURL, $('#frmRegister').serialize(), function(data) {
            if (data.success) {
                $('#frmRegister')[0].reset();
                $('#modalCreate').modal('hide');
                $("#loading").hide();

                grid.bootgrid("reload")

                divSuccessShow(data.message);
            } else {
                var errorMsg = "";
                var xComa = "";

                for(var indx in data.errors) {
                    var errors = data.errors[indx];
                    errorMsg = xComa + errors[0];
                    xComa = ", ";
                }

                divModalErrorShow(errorMsg);
                $("#loading").hide();
            }
        }).fail(function() {
            $("#loading").hide();
        });
    }

    function showItem(id) {
        currentId = id;
        $("#loading").show();
        $.get(pathURL + '/' + currentId, function(data) {
            $("#name").val(data.name);
            $("#last_name").val(data.last_name);
            $("#email").val(data.email);
            $("#role").val(data.role);
            $("#line").val(data.line);

            $('#modalCreate').modal('show');
            $("#loading").hide();

            $("#name").focus();
            $("#name").focusout();
            $("#name").focus();

        }).fail(function() {
            $("#loading").hide();
        });
    }

    function update() {
        $("#loading").show();
        $.ajax({
            url: pathURL + "/"+ currentId,
            type: 'PUT',
            dataType: "JSON",
            data: $('#frmRegister').serialize() + "&_token=" + window.Laravel.csrfToken,
            success: function (data) {
                if (data.success) {
                    grid.bootgrid("reload")
                    divSuccessShow(data.message);
                    $('#frmRegister')[0].reset();
                    $('#modalCreate').modal('hide');
                    $("#loading").hide();
                    currentId = 0;
                } else {
                    var errorMsg = "";
                    var xComa = "";

                    for(var indx in data.errors) {
                        var errors = data.errors[indx];
                        errorMsg = xComa + errors[0];
                        xComa = ", ";
                    }

                    divModalErrorShow(errorMsg);
                    $("#loading").hide();
                }
            }
        })
        .fail(function() {
            $("#loading").hide();
        });
    }

    function fnDelete(id) {
        $.jAlert({
            'title': 'Confirmar',
            'content': '¿Seguro que desea eliminar el registro?',
            'theme': 'blue',
            'type':'confirm',
            'confirmBtnText':'Si',
            'denyBtnText':'No',
            'onConfirm': function(e) {
                $("#loading").show();
                $.ajax({
                    url: pathURL + "/"+ id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_token": window.Laravel.csrfToken,
                    },
                    success: function (data) {
                        if (data.success) {
                            grid.bootgrid("reload")
                            divSuccessShow(data.message);
                            $("#loading").hide();
                        }
                    }
                })
                .fail(function() {
                    $("#loading").hide();
                });
            }
        });
    }

    function fnChangeKey(id) {
        $.jAlert({
            'title': 'Confirmar',
            'content': '¿Seguro que desea cambiar la contraseña del usuario?',
            'theme': 'blue',
            'type':'confirm',
            'confirmBtnText':'Si',
            'denyBtnText':'No',
            'onConfirm': function(e) {
                $("#loading").show();
                $.get(pathURL + '/key/' + id, function(data) {
                    $("#loading").hide();
                    if (data.success) {
                        divSuccessShow(data.message);
                    } else {
                        divErrorShow("Ocurrio un error por favor notifiquelo al administrador");
                    }
                }).fail(function() {
                    $("#loading").hide();
                });
            }
        });
    }

    function dataExport(sFormat) {
        $("#searchPhrase").val($(".search-field").val());
        $("#searchRole").val($("#cmbRole").children("option:selected").val());
        $("#searchLine").val($("#cmbLine").children("option:selected").val());
        $("#frmExport").attr('action', "export/" + pathURL + "/" + sFormat);
        $("#frmExport").submit();
    }

    $(document).ready(function() {
        $("#divModalError").hide();

        $('#frmRegister').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
            // handle the invalid form...
            } else {
                e.preventDefault();
                if (currentId != 0) {
                    update();
                } else {
                    store();
                }
            }
        });

        grid = $("#grid-data").on("initialize.rs.jquery.bootgrid", function()
        {
            setTimeout(function() {

                $(".search").before("<div class='divAdd text-left'><button class='btn btn-success' id='btnCreate'>Nuevo</button></div>");

                var itemsRoles = '<option selected value="">Seleccione Rol</option>';
                $.each(roles, function(index, value) {
                    itemsRoles += '<option value="' + value.id + '">' + value.name + '</option>';
                });

                var itemsCampus = '<option selected value="">Seleccione Plantel</option>';
                $.each(campus, function(index, value) {
                    itemsCampus += '<option value="' + value.id + '">' + value.name + '</option>';
                });

                var filters = '<div class="search form-group">\n\
                                    <select class="form-control" id="cmbRole">\n\
                                        ' + itemsRoles + '\n\
                                    </select>\n\
                                </div>';

                $("#role").append(itemsRoles);
                $("#campus").append(itemsCampus);
                $(".search").before(filters);
                $(".actions").append('<div class="dropdown btn-group">\n\
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">\n\
                                            <i class="icon fa fa-download"></i>\n\
                                            <span class="caret"></span>\n\
                                        </button>\n\
                                        <ul class="dropdown-menu pull-right" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">\n\
                                            <li aria-selected="false">\n\
                                                <a id="export-excel" class="dropdown-item dropdown-item-button">Excel</a>\n\
                                            </li>\n\
                                            <li aria-selected="false">\n\
                                                <a id="export-pdf" class="dropdown-item dropdown-item-button">PDF</a>\n\
                                            </li>\n\
                                        </ul>\n\
                                    </div>');

                $("#export-excel").click(function() {
                   dataExport("xlsx");
                });

                $("#export-csv").click(function() {
                   dataExport("csv");
                });

                $("#export-pdf").click(function() {
                   dataExport("pdf");
                });

                $('#btnCreate').click(function() {
                    currentId = 0;
                    $('#frmRegister')[0].reset();
                    $('#modalCreate').modal('show');
                });

                $("#cmbRole").change(function() {
                    grid.bootgrid("reload");
                });

            }, 100);

        }).bootgrid({
            ajax: true,
            url: pathURL + "/get",
            post: function ()
            {
                return {
                    "_token": window.Laravel.csrfToken,
                    "role": $("#cmbRole").children("option:selected").val()
                };
            },
            labels: {
                search: "Búsqueda",
                refresh: "Actualizar",
                loading: "Cargando",
                all: "Todos",
                noResults: "No existen registros",
                infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} registros"
            },
            formatters: {
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                            "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button> " +
                            "<button type=\"button\" class=\"btn btn-xs btn-default command-key\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-key\"></span></button>";
                },
                "picture": function(column, row)
                {
                    if (row.picture != null) {
                        return "<img src=\"images/" + row.picture + "\" alt=\"Usuario\" class=\"img_radius\">";
                    } else {
                        return "<img src=\"images/ic_user.png\" alt=\"Usuario\" class=\"img_radius\">";
                    }
                }
            },
            searchSettings: {
                delay: 100,
                characters: 3
            }
        }).on("loaded.rs.jquery.bootgrid", function()
        {
            /* Executes after data is loaded and rendered */
            grid.find(".command-edit").on("click", function(e)
            {
                showItem($(this).data("row-id"));
            }).end().find(".command-delete").on("click", function(e)
            {
                fnDelete($(this).data("row-id"));
                //alert("You pressed delete on row: " + $(this).data("row-id"));
            }).end().find(".command-key").on("click", function(e)
            {
                fnChangeKey($(this).data("row-id"));
                //alert("You pressed delete on row: " + $(this).data("row-id"));
            });

            $("#loading").hide();
        });
    });
});
