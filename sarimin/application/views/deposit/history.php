<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div id="jqgrid_wrapper">
                <table id="grid"></table>
                <div id="pager"></div>
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
            url: '<?php echo site_url('deposit/gridHistory');?>',
            datatype: "json",
            mtype: "POST",
            caption: "List Menu",
            colModel: [
                {
                    label: 'ID',
                    name: 'DepositID',
                    key: true,
                    width: 5,
                    sorttype: 'number',
                    editable: true,
                    hidden: true
                },
                {
                    label: 'Deposit Number',
                    name: 'NoDeposit',
                    width: 140,
                    align: "left",
                    editable: false
                },
                {
                    label: 'AccountID',
                    name: 'AccountID',
                    width: 140,
                    align: "left",
                    editable: false,
                    formatter : function (cellvalue, options, rowObject){
                        return cellvalue + " (" + rowObject.FirstName + ")";
                    }
                },
                {
                    label: 'Amount (USD)',
                    name: 'Deposit',
                    width: 140,
                    align: "right",
                    editable: true,
                    formatter: 'number',
                    unformat:function(cellvalue){
                        return cellvalue.replace(",","");
                    },
                    editrules: {number: true,required: true, size: 20}
                },
                {
                    label: 'Deposit Date',
                    name: 'DepositDate',
                    width: 170,
                    align: "left",
                    editable: false

                },
                {
                    label: 'Status',
                    name: 'DepositStatus',
                    width: 140,
                    align: "left",
                    formatter : function(cellvalue){
                        if(cellvalue == 2){
                            return "Sukses";
                        }else{
                            return "Expired";
                        }
                    }
                },
                {
                    label: 'Confirmed Date',
                    name: 'ConfirmedDate',
                    width: 175,
                    align: "left",
                    editable: false
                },
                {
                    label: 'Confirmed By',
                    name: 'username',
                    width: 175,
                    align: "left",
                    editable: false
                }

            ],
            width: width,
            height: '100%',
            rowNum: 5,
            viewrecords: true,
            rowList: [5, 10, 20],
            sortname: 'DepositDate',
            rownumbers: true,
            rownumWidth: 35,
            sortorder: 'asc',
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
            },
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
            editurl: '<?php echo site_url('parameter/crudAccountType');?>'


        });
        //navButtons grid master
        grid.jqGrid('navGrid', '#pager',
            { 	//navbar options
                edit: false,
                excel: true,
                editicon: 'ace-icon fa fa-pencil blue',
                add: false,
                addicon: 'ace-icon fa fa-plus-circle purple',
                del: false,
                delicon: 'ace-icon fa fa-trash-o red',
                search: true,
                searchicon: 'ace-icon fa fa-search orange',
                refresh: true,
                refreshicon: 'ace-icon fa fa-refresh green',
                view: false,
                viewicon: 'ace-icon fa fa-search-plus grey'
            },
            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                width: '500',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />');
                    style_edit_form(form);
                }
            },
            {
                //new record form
                width: '500',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                closeAfterAdd: true,
                recreateForm: true,
                viewPagerButtons: false,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
                        .wrapInner('<div class="widget-header" />');
                    style_edit_form(form);
                }
            },
            {
                //delete record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    if (form.data('styled')) return false;

                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />');
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
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />');
                    style_search_form(form);
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }

            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                }
            }
        );

        function style_edit_form(form) {
            //enable datepicker on "sdate" field and switches for "stock" field
            form.find('input[name=sdate]').datepicker({format: 'yyyy-mm-dd', autoclose: true});

            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
            //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
            //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');


            //update buttons classes
            var buttons = form.next().find('.EditButton .fm-button');
            buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
            buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
            buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>');

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
            var buttons = dialog.find('.EditTable');
            buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
            buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
            buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
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