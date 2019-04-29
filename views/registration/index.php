<?
use yii\widgets\ActiveForm;
$this->title = 'Registration';
?>

<!-- Home -->

<div class="home home-small">
    <div class="home_container">
        <div class="home_background" style="background-image:url(/images/cart.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li>Registration</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout -->

<div class="checkout">
    <div class="container">
        <div class="row">
            <?$form = ActiveForm::begin([
                'options' => [
                    'class' => 'checkout_form',
                    'id' => 'checkout_form'
                ]
            ])?>
                <!-- Billing Info -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-xl-6">
                            <!-- Name -->
                            <?=$form
                                ->field($reg, 'username')
                            ?>
                        </div>
                        <div class="col-xl-6 last_name_col">
                            <!-- Last Name -->
                            <?=$form
                                ->field($reg, 'password')
                                ->passwordInput();
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <!-- Name -->
                            <?=$form
                                ->field($reg, 'name')
                            ?>
                        </div>
                        <div class="col-xl-6 last_name_col">
                            <!-- Last Name -->
                            <?=$form
                                ->field($reg, 'last_name')
                            ?>
                        </div>
                    </div>
                    <div>
                        <!-- Address -->
                        <?=$form
                            ->field($reg, 'address')
                        ?>
                    </div>
                    <div>
                        <!-- Phone no -->
                        <?=$form
                            ->field($reg, 'phone')
                        ?>
                    </div>
                    <div>
                        <!-- Email -->
                        <?=$form
                            ->field($reg, 'email')
                        ?>
                    </div>
                    <button class="button order_button newsletter_button"><span>Registration</span></button>
                </div>
            <?ActiveForm::end()?>
        </div>
    </div>
</div>
