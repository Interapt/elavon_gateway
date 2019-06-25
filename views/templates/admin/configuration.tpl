
{*configuration form*}
{if isset($confirmation)}
    <div class="alert alert-success">Settings updated</div>
{/if}

<fieldset>
    <h4>Receive credit card payments using Elavon Converge EU Gateway.</h4>
    <div class="panel" style="align-content: center">
        <img src="/prestashop/modules/elavon_converge_eu_gateway/views/images/elavon-logo-76DF5D45E8-seeklogo.com.png" alt="" width="150">
        <div class="panel-heading">
        </div>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">General Settings</a></li>
            <li><a data-toggle="tab" href="#menu1">Dynamic Descriptor Settings</a></li>

        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <legend>General Settings</legend>
        <form action="" method="post">
            <div class="centered-box">
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_enabled">Enabled
                    <span class="help-box" data-toggle="popover" data-content="Enable Elavon Converge EU Gateway">
                    </span></label>
                <div class="col-md-4">
                    <select name="elavon_enabled">
                        <option {if $elavon_enabled == "yes"} selected = selected {/if}value="yes">Yes</option>
                        <option {if $elavon_enabled != "yes"} selected = selected {/if}value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_environment">Environment
                    <span class="help-box" data-toggle="popover" data-content="Choose environment.">
                    </span>
                </label>
                <div class="col-md-4">
                    <select name="elavon_environment">
                        <option {if $elavon_environment == "sandbox"} selected = selected {/if}value="sandbox">Sandbox</option>
                        <option {if $elavon_environment != "sandbox"} selected = selected {/if}value="production">Production</option>
                    </select>
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_title">Title
                    <span class="help-box" data-toggle="popover" data-content="Payment method title that the customer will see during checkout.">
                    </span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="elavon_title" maxlength="64" value="{$elavon_title}">
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_debug">Debug
                    <span class="help-box" data-toggle="popover" data-content="Log Converge events inside System-> Maintenance> Error Logs. Use only for development purposes.">
                    </span>
                </label>
                <div class="col-md-4">
                    <select name="elavon_debug">
                        <option {if $elavon_debug == "true"} selected = selected {/if}value="true">Yes</option>
                        <option {if $elavon_debug != "true"} selected = selected {/if}value="false">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_processor_id">Processor Account Id
                    <span class="help-box" data-toggle="popover" data-content="The processor account ID is used to identify the Merchant when connecting to Converge.">
                    </span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="elavon_processor_id" value="{$elavon_processor_id}">
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_merchant_name">Merchant Name
                    <span class="help-box" data-toggle="popover" data-content="Merchant 'Doing Business As' (DBA) name.">
                    </span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="$elavon_merchant_name" value="{$elavon_merchant_name}" readonly>
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_merchant_alias">Merchant Alias
                    <span class="help-box" data-toggle="popover" data-content="The merchant alias is an unique ID that acts a username for authentication.">
                    </span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="elavon_merchant_alias" value="{$elavon_merchant_alias}">
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_public_key">Public Key
                    <span class="help-box" data-toggle="popover" data-content="The public key for your account, provided by Converge." >
                    </span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="elavon_public_key" value="{$elavon_public_key}">
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-5" for="elavon_secret_key">Secret Key
                    <span class="help-box" data-toggle="popover" data-content="The secret key for your account, provided by Converge.">
                    </span>
                </label>
                <div class="col-md-4">
                   <input type="password" name="elavon_secret_key" value="{$elavon_secret_key}">
                </div>
            </div>
            </div>
            </div>
            <div id="menu1" class="tab-pane fade">
            <legend>Dynamic Descriptor Settings</legend>
            <div class="centered-box">
                <div class="form-group clearfix">
                    <label class="col-lg-5" for="elavon_name">Name
                        <span class="help-box" data-toggle="popover" data-content="The value in the business name field of a customer's statement. Company name/DBA section and the product descriptor will contain an * in between for a total descriptor name of 25 characters.">
                    </span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" name="elavon_name" maxlength="25" value="{$elavon_name}">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-lg-5" for="elavon_phone">Phone
                        <span class="help-box" data-toggle="popover" data-content="The value in the phone number field of a customer's statement. Phone must be max 20 characters.">
                    </span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" name="elavon_phone" maxlength="20" value="{$elavon_phone}">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-lg-5" for="elavon_url">URL
                        <span class="help-box" data-toggle="popover" data-content="The value in the URL/web address field of a customer's statement. The URL must be 13 characters or shorter.">
                    </span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" name="elavon_url" maxlength="13" value="{$elavon_url}">
                    </div>
                </div>
            </div>
            </div>


            <div class="panel-footer">
                <input class="btn btn-default pull-right" type="submit" name="Configuration_form" value="Save" />
            </div>
        </form>
    </div>
</fieldset>
