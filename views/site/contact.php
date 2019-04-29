<?
use yii\widgets\ActiveForm;
$this->title = 'Contact';

?>
    <!-- Home -->

    <div class="home home-small">
        <div class="home_container">
            <div class="home_background" style="background-image:url(/images/contact.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li>Contact</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">
        <div class="container">
            <div class="row">

                <!-- Get in touch -->
                <div class="col-lg-8 contact_col">
                    <div class="get_in_touch">
                        <div class="section_title">Get in Touch</div>
                        <div class="section_subtitle">Say hello</div>
                        <div class="contact_form_container">
                            <? $form=ActiveForm::begin([
                                    'options' => [
                                        'class' => 'contact_form',
                                        'id' => 'contact_form'
                                    ]
                            ]);
                            ?>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <?=$form->field($contact, 'name')
                                            ->textInput(['class' => 'contact_input', 'id' => 'contact_name'])?>
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <?=$form->field($contact, 'last_name')
                                            ->textInput(['class' => 'contact_input', 'id' => 'contact_last_name'])?>

                                    </div>
                                </div>
                                <div>
                                    <!-- Subject -->
                                    <?=$form->field($contact, 'subject')
                                        ->textInput(['class' => 'contact_input', 'id' => 'contact_company'])?>
                                </div>
                                <div>
                                    <?=$form->field($contact, 'message')
                                        ->textarea(['rows' => '8', 'class' => 'contact_input contact_textarea', 'id' => 'contact_textarea'])
                                    ?>

                                </div>
                            <?
//                            echo '<pre>';
//                            var_dump($post);
//                            echo '</pre>';
                            ?>
                            <button class="button contact_button newsletter_button"><span>Send Message</span></button>
                            <? ActiveForm::end()?>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 offset-xl-1 contact_col">
                    <div class="contact_info">
                        <div class="contact_info_section">
                            <div class="contact_info_title">Marketing</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>yourmail@gmail.com</span></li>
                            </ul>
                        </div>
                        <div class="contact_info_section">
                            <div class="contact_info_title">Shippiing & Returns</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>yourmail@gmail.com</span></li>
                            </ul>
                        </div>
                        <div class="contact_info_section">
                            <div class="contact_info_title">Information</div>
                            <ul>
                                <li>Phone: <span>+53 345 7953 3245</span></li>
                                <li>Email: <span>yourmail@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>