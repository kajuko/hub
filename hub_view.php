<?php
    global $path;?>

<script type="text/javascript" src="<?php echo $path; ?>Lib/tablejs/table.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/tablejs/custom-table-fields.js"></script>

<h2>Hubs</h2>

<div id="table"></div>

<script>

    var path = "<?php echo $path; ?>";

    var hub = {
        'hublist':function()
        {
            var result = {};
            $.ajax({ url: path+"hub/hublist.json", dataType: 'json', async: false, success: function(data) {result = data;} });
            return result;
        }
    }

    // Extend table library field types
    for (z in customtablefields)
        table.fieldtypes[z] = customtablefields[z];

    table.element = "#table";

    table.fields = {
	'id':{'title':"<?php echo _('ID'); ?>", 'type':"fixed"},
        'hubid':{'title':"<?php echo _('Hub ID'); ?>", 'type':"fixed"},
        'hubip':{'title':"<?php echo _('IP address'); ?>", 'type':"fixed"},
        'hubkey':{'title':"<?php echo _('api-key'); ?>", 'type':"fixed"},
        'hubunix':{'title':"<?php echo _('Unix timestamp'); ?>", 'type':"fixed"},
        'time':{'title':"<?php echo _('Last updated at'); ?>", 'type':"fixed"}
    }

    table.data = hub.hublist();
    table.draw();

</script>