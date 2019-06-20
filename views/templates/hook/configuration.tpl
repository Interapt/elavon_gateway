{**configuration form**}
{if isset($confirmation)}
    <div class="alert alert-success">Settings updated</div>
{/if}

<fieldset>

    <h4>Recieve credit card payments using Elavon Converge EU Gateway</h4>
    <div class="panel" style="align-content: center">
       <img src="/prestashop/modules/elavon_converge_eu_gateway/views/images/elavon-logo-76DF5D45E8-seeklogo.com.png" alt="" width="150" >
            <div class = "panel-heading">
            </div>
        <legend>Settings</legend>
        <form action="" method="post">
            <div class ="centered-box">
            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_enabled">Enabled
                <span class="help-box" data-toggle="popover" data-content="Enable Elavon Converge EU Gateway">
                    </span>
                        </label>
                <div class="col-md-4">

                    <select name = "elavon_enabled">
                        <span class="help-box" data-toggle="popover" data-content="Enable Elavon Converge EU Gateway">
                        </span>

                        <option {if $elavon_enabled == 'Yes'} selected=selected {/if}value="Yes">Yes</option>
                        <option {if $elavon_enabled != 'Yes'} selected=selected {/if}value="NO" >NO</option>
                    </select>
                </div>
            </div>

            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_environment">Environment
                    <span class="help-box" data-toggle="popover" data-content="Choose environment."
                    </span>
                </label>
                <div class="col-md-4">
                    <select name = "elavon_environment">
                        <option{if $elavon_environment == 'Sandbox'} selected=selected {/if} value="Sandbox">Sandbox</option>
                        <option {if $elavon_environment != 'Sandbox'} selected=selected {/if} value="Production" >Production</option>
                    </select>
                </div>
            </div>

            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_title">Title
                    <span class="help-box" data-toggle="popover" data-content="Payment method title that the customer will see during checkout."> </span>
                        </label>
                    <div class="col-md-4">
                        <input type="text" maxlength="64" name = "elavon_title" value = "{$elavon_title}">
                    </div>
                </div>

            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_debug">Debug

                <span class="help-box" data-toggle="popover" data-content="Log Converge events inside System-> Maintenance> Error Logs. Use only for development purposes.">
                    </span>
                        </label>
                <div class="col-md-4">
                    <select name = "elavon_debug">
                        <option {if $elavon_debug == 'Yes'} selected=selected {/if} value="Yes">Yes</option>
                        <option {if $elavon_debug != 'Yes'} selected=selected {/if} value="No" >No</option>
                    </select>
                </div>
            </div>

            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_processor_account_Id ">Processor Account Id
                    <span class="help-box" data-toggle="popover" data-content="The processor account ID is used to identify the Merchant when connecting to Converge.">
                        </span>
                            </label>
                <div class="col-md-4">
                    <input type="text" maxlength="64" name = "elavon_processor_account_Id" value = "{$elavon_processor_account_Id}">
                </div>
            </div>

            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_merchantName">Merchant Name
                         <span class="help-box" data-toggle="popover" data-content="Merchant 'Doing Business As' (DBA) name."> </span>
                                </label>

                <div class="col-md-4">
                    <input type="text" maxlength="64" name="elavon_merchantName" value = "{$elavon_merchantName}" readonly="readonly">
                </div>
            </div>

            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_merchantAlias">Merchant Alias
                         <span class="help-box" data-toggle="popover" data-content="The merchant alias is an unique ID that acts a username for authentication."> </span>
                            </label>

                <div class="col-md-4">
                    <input type="text" maxlength="64" name="elavon_merchantAlias" value = "{$elavon_merchantAlias}">
                </div>
            </div>

            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_publicKey">Public Key
                    <span class="help-box" data-toggle="popover" data-content="The public key for your account, provided by Converge."> </span>
                            </label>

                <div class="col-md-4">
                    <input type="text" maxlength="64"  name="elavon_publicKey" value = "{$elavon_publicKey}">
                </div>
            </div>

            <div class="form-group clearfix">
                <label  class="col-lg-5" for= "elavon_secretKey">Secret Key
                        <span class="help-box" data-toggle="popover" data-content="The secret key for your account, provided by Converge."> </span>
                                </label>

                <div class="col-lg-4">
                    <input type="password" maxlength="64" name="elavon_secretKey" value = "{$elavon_secretKey}">
                </div>
            </div>
            </div>
            <legend>DDS</legend>


            <div class="panel-footer">
                <input class="btn btn-default pull-right" type="submit" name="Configuration_form" value="Save" />
            </div>
        </form>
    </div>
</fieldset>

