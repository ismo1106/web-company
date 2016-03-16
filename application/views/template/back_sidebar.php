<ul id="main-menu" class="">
    <li id="search">
        <form method="get" action="">
            <input type="text" name="q" class="search-input" placeholder="Search something..."/>
            <button type="submit">
                <i class="entypo-search"></i>
            </button>
        </form>
    </li>
    <li>
        <a href="<?php echo site_url('back/dashboard');?>">
            <i class="entypo-gauge"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <?php $url =  "{$_SERVER['REQUEST_URI']}"; ?>
    <?php foreach ($_getMenu1 as $row1): ?>
    <?php if ($row1->menu_link == '#'): ?>
    <li>
        <?php echo "<a href='".site_url($row1->menu_link)."'>"; ?>
            <?php echo $row1->menu_icon; ?>
            <span><?php echo $row1->menu_label; ?></span>
        </a>
        <ul>
            <?php foreach ($_getMenu2 as $row2): ?>
            <?php if ($row2->menu_header === $row1->menu_id): ?>
            <?php if ($row2->menu_link == '#'): ?>
            <li <?php if(substr($url, 11) == $row2->menu_link){ echo "class='active'";}?> >
                <?php echo "<a href='".site_url($row2->menu_link)."'>"; ?>
                    <?php echo $row2->menu_icon; ?>
                    <span><?php echo $row2->menu_label; ?></span>
                </a>
                <ul>
                    <?php foreach ($_getMenu3 as $row3): ?>
                    <?php if ($row3->menu_header === $row2->menu_id): ?>
                    <li>
                        <?php echo "<a href='".site_url($row3->menu_link)."'>"; ?>
                            <?php echo $row3->menu_icon; ?>
                            <span><?php echo $row3->menu_label; ?></span>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php else:?>
            <li <?php if(substr($url, 11) == $row2->menu_link){ echo "class='active'";}?>>
                <?php echo "<a href='".site_url($row2->menu_link)."'>"; ?>
                    <?php echo $row2->menu_icon; ?>
                    <span><?php echo $row2->menu_label; ?></span>
                </a>
            </li>
            <?php endif;?>
            <?php endif;?>
            <?php endforeach; ?>
        </ul>
    </li>
    <?php else:?>
    <li>
        <?php echo "<a href='".site_url($row1->menu_link)."'>"; ?>
            <?php echo $row1->menu_icon; ?>
            <span><?php echo $row1->menu_label; ?></span>
        </a>
    </li>
    <?php endif;?>
    <?php endforeach; ?>
</ul>