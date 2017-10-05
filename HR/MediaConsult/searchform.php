<form action="<?php bloginfo('home'); ?>/" method="get" id="searchform">
    <fieldset class="search-fieldset">
        <input type="text" class="search-input" name="s" id="s" value="search"
        onfocus="if(this.value=='search') {this.value='';}" onblur="if(this.value=='') {this.value='search'}" />
        <input type="submit" class="input-arrow" id="searchsubmit" />
    </fieldset>
</form>
