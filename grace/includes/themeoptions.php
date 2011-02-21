<?php
class Panel {
	var $default_settings = Array(
	    'galleryspeed' => 'default',
	    'autothumb' => 'timthumbon',
	);

	function Panel() {
		add_action('admin_menu', array(&$this, 'admin_menu'));
		add_action('admin_head', array(&$this, 'admin_head'));
		if (!is_array(get_option('Grace')))
			add_option('Grace', $this->default_settings);
			$this->options = get_option('Grace');
	}

	function admin_menu() {
		add_theme_page('Grace', 'Grace Options', 'edit_themes', 'Grace', array(&$this, 'optionsmenu'));
	}

	function admin_head() {}

	function optionsmenu() {
    	if ($_POST['act1'] == 'save') {
    	    
    		if (isset($_POST['galleryspeed_act2'])) {
    			$this->options['galleryspeed'] = $_POST['galleryspeed_act2'];
    		}
    		else { $this->options['colorscheme'] = 'default'; }
    		
    		
    		if (isset($_POST['autothumb_act2'])) {
    			$this->options['autothumb'] = $_POST['autothumb_act2'];
    		}
    		else { $this->options["autothumb"] = "timthumbon"; }
    		
    		update_option('Grace', $this->options);
			
	}
?>

<div class="wrap">
<h2>Grace Theme Options</h2>
<form action="" method="post" class="themeform" name="Form" id="Form">
    <input type="hidden" id="act1" name="act1" value="save">
    <table class="widefat">
        <thead>
            <tr>
                <th scope="col" style="width: 300px;">Grace Options</th>
                <th scope="col">Settings</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>Rotating Gallery Speed</strong><br />
                    Select how quickly you want the featured photos on the home page gallery to rotate.
                </td>
                <td>
                    <select name="galleryspeed_act2" id="galleryspeed_act2">
				<option value="default" <?php if ($this->options["galleryspeed"] == "default") { echo "selected"; }?>>Normal</option>
				<option value="fast" <?php if ($this->options["galleryspeed"] == "fast") { echo "selected"; }?>>Fast</option>
				<option value="slow" <?php if ($this->options["galleryspeed"] == "slow") { echo "selected"; }?>>Slow</option>

			  </select>
                </td>
            </tr>
            <!-- -->
            <tr>
                <td>
                    <strong>Automatic Thumbnails</strong><br />
                    Select whether to use automatic thumbnails. By default these are switched on.
                </td>
                <td>
                    <select name="autothumb_act2" id="autothumb_act2">
                        <option value="timthumbon" <?php if ($this->options["autothumb"] == "timthumbon") { echo "selected"; }?>>Auto Thumbnails On</option>
                        <option value="timthumboff" <?php if ($this->options["autothumb"] == "timthumboff") { echo "selected"; }?>>Auto Thumbnails Off</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <p class="submit" style="text-align: right; border: none; margin: 0 0 20px 0;"><input type="submit" value="Update Options" name="save" /></p>
</form>
</div>
<?php }
} ?>