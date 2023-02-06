<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {

  height: 850px;
  overflow-y: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 900px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span2">
            <div class="sidebar-nav sidebar">

                <?php foreach ($menu_list as $b) { ?>
                <div class="nav-header " data-toggle="collapse" data-target="#dashboard-menu<?php echo $b->menu; ?>">
                    <?php echo $b->menu; ?>
                </div>
                <ul id="dashboard-menu<?php echo $b->menu; ?>" class="nav nav-list collapse in">
                    <?php foreach ($submenu_list as $a) {
                        if ($a->menu_id == $b->menu_id) { ?>
                    <li><a href="<?php echo base_url(); ?><?php echo $a->submenu_link; ?>">
                            <?php echo $a->submenu; ?></a></li>

                    <?php ;
                }
            } ?>
                </ul>
                <?php 
            } ?>

            </div>
        </div> 