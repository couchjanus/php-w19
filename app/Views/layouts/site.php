<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS.'/layouts/partials/site/_head.php'; ?>
<body>
    <div class="overlay"></div>
    <?php require_once VIEWS.'/layouts/partials/site/_nav.php'; ?>
    <?php require_once VIEWS.'/layouts/partials/site/_sidebar.php'; ?>
    <div class="container">
        <?php include(VIEWS."/".$template); ?>
   </div>

   <?php require_once VIEWS.'/layouts/partials/site/_footer.php'; ?>
  
   <script src="/assets/js/main.js"></script>
</body>
</html>
