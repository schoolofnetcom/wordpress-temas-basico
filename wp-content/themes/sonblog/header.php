<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog da School of Net</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="<?php //printf('%s/assets/css/bootstrap.min.css',get_template_directory_uri());?>">-->
    <?php wp_head(); ?>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                    $pages = get_pages(['parent' => 0]);
                    foreach ($pages as $p):
                        $childPages = get_pages(['child_of' => $p->ID]);
                        if(!count($childPages)) {
                            $link = get_page_link($p->ID);
                            $title = $p->post_title;
                            printf('<li><a href="%s">%s</a></li>', $link, $title);
                        }else{
                            echo "<li>";
                            printf('<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                                    aria-haspopup="true" aria-expanded="false">%s<span class="caret"></span></a>',$p->post_title);
                            echo '<ul class="dropdown-menu">';
                            foreach ($childPages as $child) {
                                $link = get_page_link($child->ID);
                                $title = $child->post_title;
                                printf('<li><a href="%s">%s</a></li>', $link, $title);
                            }
                            echo "</li></ul>";
                        }
                    endforeach;
                ?>
            </ul>
        </div>
    </div>
</nav>