<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div id="jqgrid_wrapper">
                <table id="grid"></table>
                <div id="pager"></div>
            </div>
        </div>
        &nbsp;
        <div class="col-xs-12">
            <div id="identity">
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var grid = $("#grid");
        var pager = $("#pager");

        var parent_column = grid.closest('[class*="col-"]');
        $(window).on('resize.jqGrid', function () {
            grid.jqGrid('setGridWidth', $("#jqgrid_wrapper").width());
            pager.jqGrid('setGridWidth', $("#jqgrid_wrapper").width());
        });

        $(document).on('settings.ace.jqGrid', function (ev, event_name, collapsed) {
            if (event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed') {
                grid.jqGrid('setGridWidth', parent_column.width());
                pager.jqGrid('setGridWidth', parent_column.width());
            }
        });

        var width = $("#jqgrid_wrapper").width();
        grid.jqGrid({
            url: '<?php echo site_url('client/gridUserRequest');?>',
            datatype: "json",
            mtype: "POST",
            caption: "List Menu",
            colModel: [
                {label: 'ID', name: 'AccountID', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},
                {
                    label: 'UserID',
                    name: 'UserID',
                    width: 140,
                    align: "left",
                    editable: false
                },
                {
                    label: 'Name',
                    name: 'FirstName',
                    width: 190,
                    align: "left",
                    editable: true,
                    editrules: {required: true},
                    editoptions: {size: 40}
                },
                {
                    label: 'Account Type',
                    name: 'AccountTypeName',
                    width: 140,
                    align: "left",
                    editable: true,
                    editrules: {required: true},
                    edittype: 'select',
                    editoptions: {dataUrl: '<?php echo site_url('client/getListAccountType');?>'}
                },
                {
                    label: 'ID Type',
                    name: 'Type',
                    width: 145,
                    align: "left",
                    editable: true,
                    edittype: 'select',
                    editoptions: {dataUrl: '<?php echo site_url('client/getListID');?>'},
                    formatter: function (cellvalue, option, rowObject) {
                        var img = '<a href="../../' + rowObject.IdentificationDoc + '" target="_blank"> ' + cellvalue + ' </a>';
                        return img;
                    }

                },
                {
                    label: 'Number',
                    name: 'IDNumber',
                    width: 175,
                    align: "left",
                    editable: true,
                    editrules: {required: true},
                    editoptions: {size: 30}
                },
                {
                    label: 'Gender',
                    name: 'Gender',
                    width: 145,
                    align: "left",
                    editable: true,
                    edittype: 'select',
                    editoptions: {value: {'M': 'Male', 'F': 'Female'}}
                },
                {
                    label: 'City',
                    name: 'City',
                    width: 205,
                    align: "left",
                    editable: true,
                    editoptions: {size: 30}
                },
                {
                    label: 'Address',
                    name: 'Address',
                    width: 300,
                    align: "left",
                    editable: true,
                    edittype: 'textarea',
                    editoptions: {
                        rows: "2",
                        cols: "40"
                    }
                },
                {
                    label: 'Zipcode',
                    name: 'Zipcode',
                    width: 145,
                    align: "left",
                    editable: true,
                    editrules: {number: true, maxlength: 5}
                },
                {
                    label: 'Phone',
                    name: 'Phone',
                    width: 145,
                    align: "left",
                    editable: true
                },
                {
                    label: 'MobilePhone',
                    name: 'MobilePhone',
                    width: 145,
                    align: "left",
                    editable: true
                },
                {
                    label: 'Email',
                    name: 'Email',
                    width: 175,
                    align: "left",
                    editable: true,
                    editrules: {required: true, email: true},
                    editoptions: {size: 30}

                },
                {
                    label: 'Securtiry Question',
                    name: 'Question',
                    width: 245,
                    align: "left",
                    editable: true,
                    edittype: 'select',
                    editoptions: {dataUrl: '<?php echo site_url('client/getListSequrityQuestion');?>'}
                },
                {
                    label: 'Securtiry Answer',
                    name: 'SecurityQuestionAnswer',
                    width: 245,
                    align: "left",
                    editable: true,
                    editrules: {},
                    editoptions: {size: 30}
                },
                {
                    label: 'Bank Name',
                    name: 'BankName',
                    width: 175,
                    align: "left",
                    editable: true,
                    editrules: {},
                    editoptions: {size: 30}
                },
                {
                    label: 'Bank Address',
                    name: 'BankAddress',
                    width: 245,
                    align: "left",
                    editable: true,
                    editrules: {},
                    editoptions: {size: 30}
                }, {
                    label: 'Bank City',
                    name: 'BankCity',
                    width: 175,
                    align: "left",
                    editable: true,
                    editrules: {},
                    editoptions: {size: 30}
                }, {
                    label: 'Bank Account Name',
                    name: 'BankAccountName',
                    width: 205,
                    align: "left",
                    editable: true,
                    editrules: {},
                    editoptions: {size: 30}
                }, {
                    label: 'Bank Account Number',
                    name: 'BankAccountNumber',
                    width: 205,
                    align: "left",
                    editable: true,
                    editrules: {},
                    editoptions: {size: 30}
                }, {
                    label: 'Bank Swift',
                    name: 'BankSwift',
                    width: 125,
                    align: "left",
                    editable: true,
                    editrules: {},
                    editoptions: {size: 30}
                },
                {
                    label: 'IdentificationDoc',
                    name: 'IdentificationDoc',
                    width: 125,
                    align: "left",
                    editable: true,
                    hidden: true,
                    editrules: {},
                    editoptions: {size: 30}
                }


            ],
            width: width,
            height: '100%',
            rowNum: 5,
            viewrecords: true,
            rowList: [5, 10, 20],
            sortname: 'FirstName ',
            rownumbers: true,
            rownumWidth: 35,
            sortorder: 'asc',
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            pager: '#pager',
            jsonReader: {
                root: 'Data',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function () {
                var table = this;
                setTimeout(function () {
                    //  styleCheckbox(table);

                    //  updateActionIcons(table);
                    updatePagerIcons(table);
                    enableTooltips(table);
                }, 0);
            },
            onSelectRow: function (rowid) {
                /*var celValue = grid.jqGrid('getCell', rowid, 'IdentificationDoc');
                 if (rowid != null) {
                 var img = '<img src="../../' +celValue + ' " height="300px;">';
                 $('#identity').html(img);
                 }*/
            },

            editurl: '<?php echo site_url('menu/crudMenu');?>'


        });
        //navButtons grid master
        grid.jqGrid('navGrid', '#pager',
            { 	//navbar options
                edit: false,
                excel: false,
                editicon: 'ace-icon fa fa-pencil blue',
                add: false,
                addicon: 'ace-icon fa fa-plus-circle purple',
                del: false,
                delicon: 'ace-icon fa fa-trash-o red',
                search: false,
                searchicon: 'ace-icon fa fa-search orange',
                refresh: false,
                refreshicon: 'ace-icon fa fa-refresh green',
                view: true,
                viewicon: 'ace-icon fa fa-search-plus grey'
            },
            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                    style_edit_form(form);
                    form.css({"height": 0.515 * screen.height + "px"});
                    form.css({"width": 0.45 * screen.width + "px"});
                }
            },
            {
                //new record form
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                closeAfterAdd: true,
                recreateForm: true,
                viewPagerButtons: false,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
                        .wrapInner('<div class="widget-header" />')
                    style_edit_form(form);
                    form.css({"height": 0.515 * screen.height + "px"});
                    form.css({"width": 0.45 * screen.width + "px"});
                }
            },
            {
                //delete record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    if (form.data('styled')) return false;

                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                    style_delete_form(form);

                    form.data('styled', true);
                },
                onClick: function (e) {
                    //alert(1);
                }
            },
            {
                //search form
                // closeAfterSearch: true,
                recreateForm: true,
                afterShowSearch: function (e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                    style_search_form(form);
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }

            },
            {
                //view record form
                width: 600,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                }
            }
        ).navButtonAdd('#pager', {
            caption: "",
            buttonicon: "ui-separator"
            // onClickButton: getSelectedRow,
//            position:"last",
//            title: "Separator",
//            cursor: "pointer",
//            id :"Separator"
        }).navButtonAdd('#pager', {
            caption: "Accept",
            buttonicon: "ace-icon fa fa-check-square-o green",
            onClickButton: approve,
            position: "last",
            title: "Accept",
            cursor: "pointer",
            id: "approve"
        }).navButtonAdd('#pager', {
            caption: "",
            buttonicon: "ui-separator"
            // onClickButton: getSelectedRow,
//            position:"last",
//            title: "Separator",
//            cursor: "pointer",
//            id :"Separator"
        }).navButtonAdd('#pager', {
            caption: "Reject",
            buttonicon: "ace-icon fa fa-times red",
            onClickButton: reject,
            position: "last",
            title: "Reject",
            cursor: "pointer",
            id: "reject"
        });

        function approve() {
            var rowKey = grid.jqGrid('getGridParam', 'selrow');
            var name = grid.jqGrid('getCell', rowKey, 'FirstName');
            var UserID = grid.jqGrid('getCell', rowKey, 'UserID');

            if (rowKey) {
                swal({
                    title: "Are you sure approve?",
                    text: name + " # " + UserID,
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                }, function () {
                    $.ajax({
                        url: '<?php echo site_url('client/approve');?>',
                        data: {account_id: rowKey},
                        type: 'POST',
                        success: function (data) {
                            swal("Approved!", "1 user has been approved.", "success");
                            grid.trigger('reloadGrid');

                        }
                    });

                });
            }

            else {
                $.jgrid.viewModal("#alertmod_" + this.id, {toTop: true, jqm: true});
            }

        }

        function reject() {
            var rowKey = grid.jqGrid('getGridParam', 'selrow');
            var name = grid.jqGrid('getCell', rowKey, 'FirstName');
            var UserID = grid.jqGrid('getCell', rowKey, 'UserID');

            if (rowKey) {
                swal({
                    title: "Are you sure reject?",
                    text: name + " # " + UserID,
                    type: "input",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    animation: "slide-from-top",
                    inputPlaceholder: "Write something"
                }, function (inputValue) {
                    if (inputValue === false) return false;
                    if (inputValue === "") {
                        swal.showInputError("You need to write something!");
                        return false
                    }
                    $.ajax({
                        url: '<?php echo site_url('client/reject');?>',
                        data: {account_id: rowKey, reason:inputValue},
                        type: 'POST',
                        success: function (data) {
                            swal("Rejected!", "1 user has been reject.", "error");
                            grid.trigger('reloadGrid');

                        }
                    });

                });
            }

            else {
                $.jgrid.viewModal("#alertmod_" + this.id, {toTop: true, jqm: true});
            }
        }

        function style_edit_form(form) {
            //enable datepicker on "sdate" field and switches for "stock" field
            form.find('input[name=sdate]').datepicker({format: 'yyyy-mm-dd', autoclose: true})

            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
            //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
            //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');


            //update buttons classes
            var buttons = form.next().find('.EditButton .fm-button');
            buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
            buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
            buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')

            buttons = form.next().find('.navButton a');
            buttons.find('.ui-icon').hide();
            buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
            buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
        }

        function style_delete_form(form) {
            var buttons = form.next().find('.EditButton .fm-button');
            buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
            buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
            buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
        }

        function style_search_filters(form) {
            form.find('.delete-rule').val('X');
            form.find('.add-rule').addClass('btn btn-xs btn-primary');
            form.find('.add-group').addClass('btn btn-xs btn-success');
            form.find('.delete-group').addClass('btn btn-xs btn-danger');
        }

        function style_search_form(form) {
            var dialog = form.closest('.ui-jqdialog');
            var buttons = dialog.find('.EditTable')
            buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
            buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
            buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
        }

        function beforeDeleteCallback(e) {
            var form = $(e[0]);
            if (form.data('styled')) return false;

            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_delete_form(form);

            form.data('styled', true);
        }

        function beforeEditCallback(e) {
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_edit_form(form);
        }


        //replace icons with FontAwesome icons like above
        function updatePagerIcons(table) {
            var replacement =
            {
                'ui-icon-seek-first': 'ace-icon fa fa-angle-double-left bigger-140',
                'ui-icon-seek-prev': 'ace-icon fa fa-angle-left bigger-140',
                'ui-icon-seek-next': 'ace-icon fa fa-angle-right bigger-140',
                'ui-icon-seek-end': 'ace-icon fa fa-angle-double-right bigger-140'
            };
            $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function () {
                var icon = $(this);
                var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

                if ($class in replacement) icon.attr('class', 'ui-icon ' + replacement[$class]);
            })
        }

        function enableTooltips(table) {
            $('.navtable .ui-pg-button').tooltip({container: 'body'});
            $(table).find('.ui-pg-div').tooltip({container: 'body'});
        }

    });

</script>