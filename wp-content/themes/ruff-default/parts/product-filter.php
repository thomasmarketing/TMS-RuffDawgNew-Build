<form method="GET" class="product-filter">

    <select name="orderby" onchange="this.form.submit()">

        <option value="" <?php selected($_GET['orderby'] ?? '', ''); ?>>Default Sorting</option>

        <option value="popularity"
            <?php selected($_GET['orderby'] ?? '', 'popularity'); ?>>
            Sort by Popularity
        </option>

        <option value="latest"
            <?php selected($_GET['orderby'] ?? '', 'latest'); ?>>
            Sort by Latest
        </option>

        <option value="price_low"
            <?php selected($_GET['orderby'] ?? '', 'price_low'); ?>>
            Sort by Price: Low to High
        </option>

        <option value="price_high"
            <?php selected($_GET['orderby'] ?? '', 'price_high'); ?>>
            Sort by Price: High to Low
        </option>

    </select>

</form>