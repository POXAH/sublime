

<div class="home-small"></div>
<?
if ($type = 'subscribe'){?>
    <div class="container">
        <h1>Mail confirmed</h1>
    </div>

    <?
} else if($type = 'contact')  {?>

    <div class="container">
        <h1>Email sent</h1>
    </div>

    <?
} else if($type = 'registration')  {?>

<div class="container">
    <h1>Thank you for registering</h1>
</div>

<?
} else if($type = 'order')  {?>

<div class="container">
    <h1>Thx for your visit.</h1>
</div>

<?
}
?>


