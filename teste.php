<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style type="text/css">
    .content.active {
  display:block;
}
.content {
  display:none;
}
</style>
</head>
<body>
    <button class="btn btn-primary" id="iconx">click me
 <i class="fa fa-plus-circle"></i></button>
<div class="content active">
   + div plus
</div>
<div class="content">
   - div minus
</div>
</body>
<script type="text/javascript">
    $('#iconx').click(function() {
  $(this).find('i').toggleClass('fa-minus-circle fa-plus-circle');
  $('.content').toggleClass('active');
});
</script>
</html>