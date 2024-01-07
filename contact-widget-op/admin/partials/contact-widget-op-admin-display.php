<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://olli.page
 * @since      1.0.0
 *
 * @package    Contact_Widget_Op
 * @subpackage Contact_Widget_Op/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<div class="contact-widget-settings">
    <form method="post" action="options.php">
        <?php 

    settings_fields( 'contactWidgetSettings' );
    do_settings_sections( 'contactWidgetSettings' );

    $whatsapp = get_option('whatsapp');
    $sms = get_option('sms');
    $phone = get_option('phone');
    $email = get_option('email');
    $checkWhereToShow = get_option('whereToShow');
    $checkWhenToShow = get_option('whenToShow');
    $checkLivemode = get_option('SetToBeLive');
    $checkSpecificTime = get_option('specificTimeIsSelected');
    $checkSpecificWeekday = get_option('specificWeekdayIsSelected');
    $checkWeekdayMonday = get_option('monday');
    $checkWeekdayTuesday = get_option('tuesday');
    $checkWeekdayWednesday = get_option('wednesday');
    $checkWeekdayThursday = get_option('thursday');
    $checkWeekdayFriday = get_option('friday');
    $checkWeekdaySaturday = get_option('saturday');
    $checkWeekdaySunday = get_option('sunday');
    $getButtonBackgroundcolor = get_option( 'contactWidgetButtonContainerColor' );
    $getButtonColor = get_option( 'contactWidgetButtonColor' );
    $getButtonHoverColor = get_option( 'contactWidgetButtonHoverColor' );
    $getButtonIconColor = get_option( 'contactWidgetButtonIconColor' );
    $getItemIconColor = get_option( 'contactWidgetItemIconColor' );
    $getItemColor = get_option( 'contactWidgetItemColor' );
    $getItemHoverColor = get_option( 'contactWidgetItemHoverColor' );
    ?>
        <div class="select-contact-type contact-widget-card">
            <div class="contact-widget-card-header">
                <svg width="30" height="30" viewBox="0 0 24 24" class="section-icon">
                    <path
                        d="M6.02 7.389c.399-.285.85-.417 1.292-.417.944 0 1.852.6 2.15 1.599-.382-.294-.83-.437-1.281-.437-.458 0-.919.147-1.321.434-.799.57-1.153 1.541-.845 2.461-1.242-.89-1.247-2.747.005-3.64zm3.741 12.77c.994.334 4.071 1.186 7.635 3.841l6.604-4.71c-1.713-2.402-1.241-4.082-2.943-6.468-1.162-1.628-1.827-1.654-3.037-1.432l.599.84c.361.507-.405 1.05-.764.544l-.534-.75c-.435-.609-1.279-.229-2.053-.051l.727 1.019c.36.505-.403 1.051-.764.544l-.629-.882c-.446-.626-1.318-.208-2.095-.01l.769 1.078c.363.508-.405 1.049-.764.544l-3.118-4.366c-.968-1.358-3.088.083-2.086 1.489l4.605 6.458c-.494-.183-1.363-.349-1.93-.349-1.754 0-2.429 1.92-.222 2.661zm-3.286-2.159h-4.475v-14h10v6.688l2-.471v-8.217c0-1.104-.895-2-2-2h-10c-1.105 0-2 .896-2 2v18.678c-.001 2.213 3.503 3.322 7.005 3.322 1.812 0 3.619-.299 4.944-.894-2.121-.946-6.378-1.576-5.474-5.106z" />
                    <defs>
                        <linearGradient id="iconGradient" x1="80.86%" x2="19.14%" y1="0%" y2="100%">
                            <stop offset="0%" stop-color="#b621fe" />
                            <stop offset="100%" stop-color="#1fd1f9" />
                        </linearGradient>
                    </defs>
                </svg>
                <h2 class="contact-widget-card-title">Select contact channels</h2>
            </div>
            <div class="contact-widget-card-body">
                <input type="checkbox" id="contactWidgetWhatsapp" name="whatsapp" value="whatsapp"
                    <?php if ($whatsapp == 'whatsapp') : echo 'checked'; endif; ?>>

                <input type="checkbox" id="contactWidgetSms" name="sms" value="sms"
                    <?php if ($sms == 'sms') : echo 'checked'; endif; ?>>

                <input type="checkbox" id="contactWidgetPhone" name="phone" value="phone"
                    <?php if ($phone == 'phone') : echo 'checked'; endif; ?>>

                <input type="checkbox" id="contactWidgetEmail" name="email" value="email"
                    <?php if ($email == 'email') : echo 'checked'; endif; ?>>


                <div class="items-row">
                    <label for="contactWidgetWhatsapp" class="item-column whatsapp-column">
                        <p style="position: absolute; bottom: -23px; margin: 0px; opacity: .8; font-size: 95%;">Whatsapp
                        </p>
                        <div class="item-inner-column">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                        </div>
                    </label>
                    <label for="contactWidgetSms" class="item-column sms-column">
                        <p style="position: absolute; bottom: -23px; margin: 0px; opacity: .8; font-size: 95%;">SMS
                        </p>
                        <div class="item-inner-column">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M12 3c5.514 0 10 3.592 10 8.007 0 4.917-5.144 7.961-9.91 7.961-1.937 0-3.384-.397-4.394-.644-1 .613-1.594 1.037-4.272 1.82.535-1.373.722-2.748.601-4.265-.837-1-2.025-2.4-2.025-4.872 0-4.415 4.486-8.007 10-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.739 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.417.345 2.774.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006zm-4.449 10.151c.246.277.369.621.369 1.034 0 .529-.208.958-.624 1.289-.416.33-.996.495-1.74.495-.637 0-1.201-.123-1.69-.367l.274-1.083c.494.249.993.375 1.501.375.293 0 .521-.056.686-.167.315-.214.334-.646.023-.892-.149-.117-.404-.236-.769-.357-1.097-.366-1.645-.937-1.645-1.716 0-.503.202-.917.604-1.243.404-.325.943-.488 1.614-.488.586 0 1.096.099 1.535.298l-.299 1.049c-.401-.187-.82-.28-1.254-.28-.267 0-.476.052-.627.153-.299.204-.293.57-.035.787.126.107.428.246.91.416.532.187.92.42 1.167.697zm12.205-.021c-.249-.28-.645-.518-1.181-.706-.475-.168-.776-.307-.899-.41-.243-.205-.249-.545.032-.738.146-.099.352-.148.609-.148.464 0 .87.104 1.274.295l.316-1.111-.022-.012c-.441-.199-.962-.3-1.55-.3-.675 0-1.225.166-1.632.495-.41.33-.618.757-.618 1.267 0 .791.562 1.377 1.67 1.745.357.122.612.239.757.353.292.231.28.637-.022.841-.157.108-.381.162-.667.162-.549 0-1.042-.145-1.522-.39l-.29 1.147c.549.273 1.122.38 1.728.38.749 0 1.34-.168 1.759-.502.422-.334.636-.776.636-1.313 0-.418-.127-.772-.378-1.055zm-6.644-3.005l-1.228 3.967-1.014-3.967h-1.791l-.366 5.75h1.229l.204-4.642h.018s.702 2.878 1.178 4.547h1.031c.794-2.419 1.261-3.936 1.399-4.547h.026c0 .813.045 2.36.136 4.642h1.298l-.309-5.75h-1.811z" />
                            </svg>
                        </div>
                    </label>
                    <label for="contactWidgetPhone" class="item-column phone-column">
                        <p style="position: absolute; bottom: -23px; margin: 0px; opacity: .8; font-size: 95%;">Phone
                        </p>
                        <div class="item-inner-column">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z" />
                            </svg>
                        </div>
                    </label>
                    <label for="contactWidgetEmail" class="item-column email-column">
                        <p style="position: absolute; bottom: -23px; margin: 0px; opacity: .8; font-size: 95%;">Email
                        </p>
                        <div class="item-inner-column">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                            </svg>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="contact-widget-row contact-widget-grid-gap new-section-start">
            <div class="contact-widget-col-6 contact-fields contact-widget-card" id="contactFields">
                <div class="contact-widget-card-header">
                    <svg width="30" height="30" viewBox="0 0 24 24" class="section-icon">
                        <path
                            d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                        <defs>
                            <linearGradient id="iconGradient" x1="80.86%" x2="19.14%" y1="0%" y2="100%">
                                <stop offset="0%" stop-color="#cc208e" />
                                <stop offset="100%" stop-color="#6713d2" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h2 class="contact-widget-card-title">Your contact details:</h2>
                </div>
                <div class="contact-widget-card-body">
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Call To Action" id="contactWidgetcta"
                            name="cta" value="<?php echo get_option( 'cta' ); ?>" />
                        <label for="contactWidgetcta" class="form__label">Call To Action</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Phone" id="contactWidgetPhone"
                            name="contactWidgetPhone" value="<?php echo get_option( 'contactWidgetPhone' ); ?>" />
                        <label for="contactWidgetPhone" class="form__label">Phone</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Email" id="contactWidgetEmail"
                            name="contactWidgetEmail" value="<?php echo get_option( 'contactWidgetEmail' ); ?>" />
                        <label for="contactWidgetEmail" class="form__label">Email</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Prefilled text" id="contactWidgetPretext"
                            name="contactWidgetPretext" value="<?php echo get_option( 'contactWidgetPretext' ); ?>" />
                        <label for="contactWidgetPretext" class="form__label">Prefilled text</label>
                    </div>
                </div>
            </div>
            <div class="contact-widget-col-6 contact-widget-card">
                <div class="contact-widget-card-header">
                    <svg width="30" height="30" viewBox="0 0 24 24" class="section-icon">
                        <path
                            d="M8.997 13.985c.01 1.104-.88 2.008-1.986 2.015-1.105.009-2.005-.88-2.011-1.984-.01-1.105.879-2.005 1.982-2.016 1.106-.007 2.009.883 2.015 1.985zm-.978-3.986c-1.104.008-2.008-.88-2.015-1.987-.009-1.103.877-2.004 1.984-2.011 1.102-.01 2.008.877 2.012 1.982.012 1.107-.88 2.006-1.981 2.016zm7.981-4.014c.004 1.102-.881 2.008-1.985 2.015-1.106.01-2.008-.879-2.015-1.983-.011-1.106.878-2.006 1.985-2.015 1.101-.006 2.005.881 2.015 1.983zm-12 15.847c4.587.38 2.944-4.492 7.188-4.537l1.838 1.534c.458 5.537-6.315 6.772-9.026 3.003zm14.065-7.115c1.427-2.239 5.846-9.748 5.846-9.748.353-.623-.429-1.273-.975-.813 0 0-6.572 5.714-8.511 7.525-1.532 1.432-1.539 2.086-2.035 4.447l1.68 1.4c2.227-.915 2.868-1.04 3.995-2.811zm-12.622 4.806c-2.084-1.82-3.42-4.479-3.443-7.447-.044-5.51 4.406-10.03 9.92-10.075 3.838-.021 6.479 1.905 6.496 3.447l1.663-1.456c-1.01-2.223-4.182-4.045-8.176-3.992-6.623.055-11.955 5.466-11.903 12.092.023 2.912 1.083 5.57 2.823 7.635.958.492 2.123.329 2.62-.204zm12.797-1.906c1.059 1.97-1.351 3.37-3.545 3.992-.304.912-.803 1.721-1.374 2.311 5.255-.591 9.061-4.304 6.266-7.889-.459.685-.897 1.197-1.347 1.586z" />
                        <defs>
                            <linearGradient id="iconGradient" x1="80.86%" x2="19.14%" y1="0%" y2="100%">
                                <stop offset="0%" stop-color="#cc208e" />
                                <stop offset="100%" stop-color="#6713d2" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h2 class="contact-widget-card-title">Choose colors:</h2>
                </div>
                <div class="contact-widget-card-body contact-widget-row">
                    <div class="contact-widget-col-6">
                        <p>Button container color:</p>
                        <input type="text" name="contactWidgetButtonContainerColor"
                            id="contactWidgetButtonContainerColor" data-coloris class="coloris"
                            value="<?php if (!empty( $getButtonBackgroundcolor )) : echo $getButtonBackgroundcolor; else : echo 'rgba(0, 0, 0, 0.4)'; endif; ?>" />
                    </div>
                    <div class="contact-widget-col-6">
                        <p>Button color:</p>
                        <input type="text" name="contactWidgetButtonColor" id="contactWidgetButtonColor" data-coloris
                            class="coloris"
                            value="<?php if (!empty( $getButtonColor )) : echo $getButtonColor; else : echo '#0D0C22'; endif; ?>" />
                    </div>
                    <div class="contact-widget-col-6">
                        <p>Button hover color:</p>
                        <input type="text" name="contactWidgetButtonHoverColor" id="contactWidgetButtonHoverColor"
                            data-coloris class="coloris"
                            value="<?php if (!empty( $getButtonHoverColor )) : echo $getButtonHoverColor; else : echo '#000009'; endif; ?>" />
                    </div>
                    <div class="contact-widget-col-6">
                        <p>Button icon color:</p>
                        <input type="text" name="contactWidgetButtonIconColor" id="contactWidgetButtonIconColor"
                            data-coloris class="coloris"
                            value="<?php if (!empty( $getButtonIconColor )) : echo $getButtonIconColor; else : echo '#fff'; endif; ?>" />
                    </div>
                    <div class="contact-widget-col-6">
                        <p>Button item color:</p>
                        <input type="text" name="contactWidgetItemColor" id="contactWidgetItemColor" data-coloris
                            class="coloris"
                            value="<?php if (!empty( $getItemColor )) : echo $getItemColor; else : echo '#403F55'; endif; ?>" />
                    </div>
                    <div class="contact-widget-col-6">
                        <p>Button item hover color:</p>
                        <input type="text" name="contactWidgetItemHoverColor" id="contactWidgetItemHoverColor"
                            data-coloris class="coloris"
                            value="<?php if (!empty( $getItemHoverColor )) : echo $getItemHoverColor; else : echo '#27263C'; endif; ?>" />

                    </div>
                    <div class="contact-widget-col-6">
                        <p>Button item icon color:</p>
                        <input type="text" name="contactWidgetItemIconColor" id="contactWidgetItemIconColor"
                            data-coloris class="coloris"
                            value="<?php if (!empty( $getItemIconColor )) : echo $getItemIconColor; else : echo '#fff'; endif; ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-widget-row new-section-start contact-widget-grid-gap">
            <div class="contact-widget-col-6 contact-widget-card">
                <div class="contact-widget-card-header">
                    <svg width="30" height="30" viewBox="0 0 24 24" class="section-icon">
                        <path
                            d="M17.492 15.432c-.433 0-.855-.087-1.253-.259l.467-1.082c.25.107.514.162.786.162.222 0 .441-.037.651-.11l.388 1.112c-.334.118-.683.177-1.039.177zm-10.922-.022c-.373 0-.741-.066-1.093-.195l.407-1.105c.221.081.451.122.686.122.26 0 .514-.05.754-.148l.447 1.09c-.382.157-.786.236-1.201.236zm8.67-.783l-1.659-.945.583-1.024 1.66.945-.584 1.024zm-6.455-.02l-.605-1.011 1.639-.981.605 1.011-1.639.981zm3.918-1.408c-.243-.101-.5-.153-.764-.153-.23 0-.457.04-.674.119l-.401-1.108c.346-.125.708-.188 1.075-.188.42 0 .83.082 1.217.244l-.453 1.086zm7.327-.163c-.534 0-.968.433-.968.968 0 .535.434.968.968.968.535 0 .969-.434.969-.968 0-.535-.434-.968-.969-.968zm-16.061 0c-.535 0-.969.433-.969.968 0 .535.434.968.969.968s.969-.434.969-.968c0-.535-.434-.968-.969-.968zm18.031-.832v6.683l-4 2.479v-4.366h-1v4.141l-4-2.885v-3.256h-2v3.255l-4 2.885v-4.14h-1v4.365l-4-2.479v-13.294l4 2.479v3.929h1v-3.927l4-2.886v4.813h2v-4.813l1.577 1.138c-.339-.701-.577-1.518-.577-2.524l.019-.345-2.019-1.456-5.545 4-6.455-4v18l6.455 4 5.545-4 5.545 4 6.455-4v-11.618l-.039.047c-.831.982-1.614 1.918-1.961 3.775zm2-8.403c0-2.099-1.9-3.801-4-3.801s-4 1.702-4 3.801c0 3.121 3.188 3.451 4 8.199.812-4.748 4-5.078 4-8.199zm-5.5.199c0-.829.672-1.5 1.5-1.5s1.5.671 1.5 1.5-.672 1.5-1.5 1.5-1.5-.671-1.5-1.5zm-.548 8c-.212-.992-.547-1.724-.952-2.334v2.334h.952z" />
                        <defs>
                            <linearGradient id="iconGradient" x1="80.86%" x2="19.14%" y1="0%" y2="100%">
                                <stop offset="0%" stop-color="#cc208e" />
                                <stop offset="100%" stop-color="#6713d2" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h2 class="contact-widget-card-title">Select where to show</h2>
                </div>
                <div class="contact-widget-card-body">
                    <label id="everyPageContainer" class="contact-widget-label">
                        <div class="contact-widget-label-text">
                            <p>Näytä koko sivustolla:</p>
                        </div>
                        <div class="contact-widget-label-check">
                            <div class="switch">
                                <input type="radio" id="everyPageInputID" name="whereToShow" value="onEveryPage"
                                    <?php if ($checkWhereToShow == 'onEveryPage') : echo 'checked'; endif; ?>>
                                <span class="slider round"></span>
                            </div>
                        </div>
                    </label>
                    <label id="SpecificURLContainer" class="contact-widget-label">
                        <div class="contact-widget-label-text">
                            <p>Näytä tietyssä URL-osoitteessa vain:</p>
                        </div>
                        <div class="contact-widget-label-check">
                            <div class="switch">
                                <input type="radio" id="specificURLInputID" name="whereToShow" value="onlySpecificURL"
                                    <?php if ($checkWhereToShow == 'onlySpecificURL') : echo 'checked'; endif; ?>>
                                <span class="slider round"></span>
                            </div>
                        </div>
                        <div class="form__group field contact-widget-label-input" style="width: 100%;">
                            <input type="input" class="form__field" placeholder="Write specific URL-path"
                                id="showOnSpecificURL" name="showOnSpecificURL"
                                value="<?php echo get_option( 'showOnSpecificURL' ); ?>" />
                            <label for="showOnSpecificURL" class="form__label">Write specific URL-path</label>
                        </div>
                    </label>
                    <label id="URLContainsContainer" class="contact-widget-label">
                        <div class="contact-widget-label-text">
                            <p>Näytä jos URL-osoittessa sisältää tämän:</p>
                        </div>
                        <div class="contact-widget-label-check">
                            <div class="switch">
                                <input type="radio" id="URLContainsThisInputID" name="whereToShow"
                                    value="URLContainsThis"
                                    <?php if ($checkWhereToShow == 'URLContainsThis') : echo 'checked'; endif; ?>>
                                <span class="slider round"></span>
                            </div>
                        </div>
                        <div class="form__group field contact-widget-label-input" style="width: 100%;">
                            <input type="input" class="form__field" placeholder="Write URL-path" id="showIfURLContains"
                                name="showIfURLContains" value="<?php echo get_option( 'showIfURLContains' ); ?>" />
                            <label for="showIfURLContains" class="form__label">Write URL-path</label>
                        </div>
                    </label>
                </div>
            </div>
            <div class="contact-widget-col-6 contact-widget-card">
                <div class="contact-widget-card-header">
                    <svg width="30" height="30" viewBox="0 0 24 24" class="section-icon">
                        <path
                            d="M15.91 13.34l2.636-4.026-.454-.406-3.673 3.099c-.675-.138-1.402.068-1.894.618-.736.823-.665 2.088.159 2.824.824.736 2.088.665 2.824-.159.492-.55.615-1.295.402-1.95zm-3.91-10.646v-2.694h4v2.694c-1.439-.243-2.592-.238-4 0zm8.851 2.064l1.407-1.407 1.414 1.414-1.321 1.321c-.462-.484-.964-.927-1.5-1.328zm-18.851 4.242h8v2h-8v-2zm-2 4h8v2h-8v-2zm3 4h7v2h-7v-2zm21-3c0 5.523-4.477 10-10 10-2.79 0-5.3-1.155-7.111-3h3.28c1.138.631 2.439 1 3.831 1 4.411 0 8-3.589 8-8s-3.589-8-8-8c-1.392 0-2.693.369-3.831 1h-3.28c1.811-1.845 4.321-3 7.111-3 5.523 0 10 4.477 10 10z" />
                        <defs>
                            <linearGradient id="iconGradient" x1="80.86%" x2="19.14%" y1="0%" y2="100%">
                                <stop offset="0%" stop-color="#cc208e" />
                                <stop offset="100%" stop-color="#6713d2" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h2 class="contact-widget-card-title">Select when to show</h2>
                </div>
                <div class="contact-widget-card-body">
                    <label id="continiouslyContainer" class="contact-widget-label">
                        <div class="contact-widget-label-text">
                            <p>Näytä painike jatkuvasti:</p>
                        </div>
                        <div class="contact-widget-label-check">
                            <div class="switch">
                                <input type="radio" id="continiouslyInputID" name="whenToShow" value="showContiniously"
                                    <?php if ($checkWhenToShow == 'showContiniously') : echo 'checked'; endif; ?>>
                                <span class="slider round"></span>
                            </div>
                        </div>
                        <div class="contact-widget-add-grid-columns contact-widget-label-input">
                            <label id="specificTimeContainer" class="contact-widget-add-grid-columns not-selected">
                                <div class="contact-widget-more-options">
                                    <div class="contact-widget-label-text">
                                        <p>Aseta painikkeen näkyvyydelle kellon ajat:</p>
                                    </div>
                                    <div class="contact-widget-label-check">
                                        <input id="specificTimeInputID" type="checkbox" name="specificTimeIsSelected"
                                            value="specificTimeIsSelected"
                                            <?php if ($checkSpecificTime == 'specificTimeIsSelected') : echo 'checked'; endif; ?>>
                                    </div>
                                </div>
                            </label>
                            <div class="contact-widget-add-grid-columns contact-widget-row hide-element">
                                <label class="contact-widget-col-6">
                                    <p>Aloitusaika:</p>
                                    <input type="time" name="startTime"
                                        value="<?php echo get_option( 'startTime' ); ?>">
                                </label>
                                <label class="contact-widget-col-6">
                                    <p>Lopetusaika:</p>
                                    <input type="time" name="endTime" value="<?php echo get_option( 'endTime' ); ?>">
                                </label>
                            </div>
                            <label id="specificWeekdayContainer" class="contact-widget-add-grid-columns not-selected">
                                <div class="contact-widget-more-options">
                                    <div class="contact-widget-label-text">
                                        <p>Valitse tietyt viikon päivät milloin painiketta näytetään:</p>
                                    </div>
                                    <div class="contact-widget-label-check">
                                        <input id="specificWeekdayInputID" type="checkbox"
                                            name="specificWeekdayIsSelected" value="specificWeekdayIsSelected"
                                            <?php if ($checkSpecificWeekday == 'specificWeekdayIsSelected') : echo 'checked'; endif; ?>>
                                    </div>
                                </div>
                            </label>
                            <div class="contact-widget-add-grid-columns hide-element"
                                style="margin: 0px 0px 20px; background: #f1f4f6!important; padding: 20px;">
                                <div class="contact-widget-row">
                                    <label class="contact-widget-col-6 weekdays-container">
                                        <div class="week-day-text">
                                            <p>Maanantai</p>
                                        </div>
                                        <div class="week-day-check">
                                            <input type="checkbox" name="monday" value="mondaySelected"
                                                <?php if ($checkWeekdayMonday == 'mondaySelected') : echo 'checked'; endif; ?>>
                                        </div>
                                    </label>
                                    <label class="contact-widget-col-6 weekdays-container">
                                        <div class="week-day-text">
                                            <p>Tiistai</p>
                                        </div>
                                        <div class="week-day-check">
                                            <input type="checkbox" name="tuesday" value="tuesdaySelected"
                                                <?php if ($checkWeekdayTuesday == 'tuesdaySelected') : echo 'checked'; endif; ?>>
                                        </div>
                                    </label>
                                    <label class="contact-widget-col-6 weekdays-container">
                                        <div class="week-day-text">
                                            <p>Keskiviikko</p>
                                        </div>
                                        <div class="week-day-check">
                                            <input type="checkbox" name="wednesday" value="wednesdaySelected"
                                                <?php if ($checkWeekdayWednesday == 'wednesdaySelected') : echo 'checked'; endif; ?>>
                                        </div>
                                    </label>
                                    <label class="contact-widget-col-6 weekdays-container">
                                        <div class="week-day-text">
                                            <p>Torstai</p>
                                        </div>
                                        <div class="week-day-check">
                                            <input type="checkbox" name="thursday" value="thursdaySelected"
                                                <?php if ($checkWeekdayThursday == 'thursdaySelected') : echo 'checked'; endif; ?>>
                                        </div>
                                    </label>
                                    <label class="contact-widget-col-6 weekdays-container">
                                        <div class="week-day-text">
                                            <p>Perjantai</p>
                                        </div>
                                        <div class="week-day-check">
                                            <input type="checkbox" name="friday" value="fridaySelected"
                                                <?php if ($checkWeekdayFriday == 'fridaySelected') : echo 'checked'; endif; ?>>
                                        </div>
                                    </label>
                                    <label class="contact-widget-col-6 weekdays-container">
                                        <div class="week-day-text">
                                            <p>Lauantai</p>
                                        </div>
                                        <div class="week-day-check">
                                            <input type="checkbox" name="saturday" value="saturdaySelected"
                                                <?php if ($checkWeekdaySaturday == 'saturdaySelected') : echo 'checked'; endif; ?>>
                                        </div>
                                    </label>
                                    <label class="contact-widget-col-6 weekdays-container">
                                        <div class="week-day-text">
                                            <p>Sunnuntai</p>
                                        </div>
                                        <div class="week-day-check">
                                            <input type="checkbox" name="sunday" value="sundaySelected"
                                                <?php if ($checkWeekdaySunday == 'sundaySelected') : echo 'checked'; endif; ?>>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label id="specificTimePeriodContainer" class="contact-widget-label">
                        <div class="contact-widget-label-text">
                            <p>Näytä tiettynä ajankohtana:</p>
                        </div>
                        <div class="contact-widget-label-check">
                            <div class="switch">
                                <input id="specificTimePeriodInputID" type="radio" name="whenToShow"
                                    value="showSpecificTimePeriod"
                                    <?php if ($checkWhenToShow == 'showSpecificTimePeriod') : echo 'checked'; endif; ?>>
                                <span class="slider round"></span>
                            </div>
                        </div>
                        <div id="specificTimePeriodAdditionalOptions" class="contact-widget-label-input">
                            <div class="contact-widget-add-grid-columns contact-widget-row">
                                <label class="contact-widget-col-6">
                                    <p>Aloituspäivä:</p>
                                    <input type="date" name="startDate"
                                        value="<?php echo get_option( 'startDate' ); ?>">
                                </label>
                                <label class="contact-widget-col-6">
                                    <p>Aloitusaika:</p>
                                    <input type="time" name="timedStartingTime"
                                        value="<?php echo get_option( 'timedStartingTime' ); ?>">
                                </label>
                                <label class="contact-widget-col-6">
                                    <p>Lopetuspäivä:</p>
                                    <input type="date" name="endDate" value="<?php echo get_option( 'endDate' ); ?>">
                                </label>
                                <label class="contact-widget-col-6">
                                    <p>Lopetusaika:</p>
                                    <input type="time" name="timedEndingTime"
                                        value="<?php echo get_option( 'timedEndingTime' ); ?>">
                                </label>
                            </div>
                        </div>
                    </label>

                </div>
            </div>
        </div>
        <div class="contact-widget-check contact-widget-card new-section-start">
            <div class="contact-widget-card-header">
                <svg width="30" height="30" viewBox="0 0 24 24" class="section-icon">
                    <path
                        d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z" />
                    <defs>
                        <linearGradient id="iconGradient" x1="80.86%" x2="19.14%" y1="0%" y2="100%">
                            <stop offset="0%" stop-color="#cc208e" />
                            <stop offset="100%" stop-color="#6713d2" />
                        </linearGradient>
                    </defs>
                </svg>
                <h2 class="contact-widget-card-title">Set contact widget to live</h2>
            </div>
            <div class="contact-widget-card-body">
                <label id="setLiveContainer">
                    <p>Aseta painike live-tilaan:</p>
                    <div class="switch">
                        <input type="checkbox" id="setLiveInputID" name="SetToBeLive" value="isLive"
                            <?php if ($checkLivemode == 'isLive') : echo 'checked'; endif; ?>>
                        <span class="slider round"></span>
                    </div>
                </label>
            </div>
            <div class="contact-widget-card-footer">
                <div class="contact-widget-footer-body">
                    <button type="submit" class="button button-primary">Save Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>