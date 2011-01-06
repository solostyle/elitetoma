<html>
<head>
<title>Testing my own MVC</title>
     <!-- Individual YUI JS files --> 
     <?php $html = new HTML();?>
     <?php echo $html->includeJs('yui27yahoo');?>
     <?php echo $html->includeJs('yui27event');?>
     <?php echo $html->includeJs('yui27connection');?>
     <?php echo $html->includeJs('yui27dom');?>
     <?php echo $html->includeJs('elitetoma');?>
     <?php echo $html->includeJs('elitetoma.shell');?>
     <?php echo $html->includeJs('elitetoma.comments');?>
     <?php echo $html->includeJs('elitetoma.updates');?>
<?php echo $html->includeCss('base');?>
<?php echo $html->includeCss('comments');?>
<?php echo $html->includeCss('updates');?>
</head>
<body>