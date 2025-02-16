<style>div.error{display:none;}</style>
<div class="cm-wizard-step step-0">
    <h1>Welcome to the Map Locations Setup Wizard</h1>
    <p>Thank you for installing the CM Map Locations plugin!</p>
    <p>This plugin allows you to display customizable maps with interactive markers, helping your visitors easily locate<br>key places. It also enables your site users to add their own locations, fostering engagement and collaboration.</p>
    <img class="img" src="<?php echo CMLOCF_SetupWizard::$wizard_url . 'assets/img/wizard_logo.png';?>" />
    <p>To help you get started, we’ve prepared a quick setup wizard to guide you through these steps:</p>
    <ul>
        <li>• Configuring essential map settings</li>
        <li>• Customizing the fields for adding new locations</li>
        <li>• Adding the widget to display and manage locations</li>
    </ul>
    <button class="next-step" data-step="0">Start</button>
    <p><a href="<?php echo admin_url( 'admin.php?page='. CMLOCF_SetupWizard::$setting_page_slug ); ?>" >Skip the setup wizard</a></p>
</div>
<?php echo CMLOCF_SetupWizard::renderSteps(); ?>