<?php 
include_once 'modal.php';


print_r($data);

?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<div><a href="javascript:void(0)" id="export-to-excel">Export to excel</a></div>
<form action="controller.php" method="post" id="export-form">
    <input type="hidden" value='' id='hidden-type' name='ExportType' />
</form>

	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
	    <tbody class="" >
	        <?php foreach($data as $row => $val):?>
	        <tr>
	            <td> <?php echo $val[0] ?> </td>
	            <td> <?php echo $val[1] ?> </td>
	            <td> <?php echo $val[2] ?> </td>
	            <td> <?php echo $val[2] ?> </td>
	            <td> <?php echo $val[4] ?> </td>
	            <td> <?php echo $val[5] ?> </td>
	        </tr>
	        <?php endforeach; ?>
	    </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
</table>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {

    jQuery('#export-to-excel').bind("click", function() {
        var target = $(this).attr('id');
        switch (target) {
            case 'export-to-excel':
                $('#hidden-type').val(target);
                //alert($('#hidden-type').val());
                $('#export-form').submit();
                $('#hidden-type').val('');
                break
        }
    });
    
});
</script>
