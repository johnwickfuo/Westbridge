 <!-- Top Up Modal -->
 <div id="topupModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Credit/Debit <?php echo e($user->name); ?> account.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form method="post" action="<?php echo e(route('topup')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-group">
                         <input class="form-control  " placeholder="Enter amount" type="text" name="amount"
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class="">Select where to Credit/Debit</h5>
                         <select class="form-control  " name="type" required>
                             <option value="" selected disabled>Select Column</option>
                             <option value="Bonus">Bonus</option>
                             <option value="Profit">Profit</option>
                             <option value="Ref_Bonus">Ref_Bonus</option>
                             <option value="balance">Account Balance</option>
                             <option value="Deposit">Deposit</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <h5 class="">Select credit to add, debit to subtract.</h5>
                         <select class="form-control  " name="t_type" required>
                             <option value="">Select type</option>
                             <option value="Credit">Credit</option>
                             <option value="Debit">Debit</option>
                         </select>
                         <small> <b>NOTE:</b> You cannot debit deposit</small>
                     </div>
                     <div class="form-group">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                         <input type="submit" class="btn " value="Submit">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /deposit for a plan Modal -->



<!-- send a single user email Modal-->
<div id="Nostrades" class="modal fade" role="dialog">
    <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Set number of trade before withdrawal for <?php echo e($user->name); ?> <?php echo e($user->l_name); ?> </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="<?php echo e(route('numberoftrades')); ?>">
                     <?php echo csrf_field(); ?>
                     
                     <div class="form-group">
                         <h5 class=" ">Number of trades before withdrawal</h5>
                         <input type="number" name="numberoftrades" class="form-control  " placeholder="<?php echo e($user->numberoftrades); ?>">
                     </div>

                     <div class="form-group">
                         <input type="submit" class="btn " value="Set Number of Trades for Withdrawal">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>




<!-- send a single user email Modal-->
 <div id="userTax" class="modal fade" role="dialog">
    <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">On/ Off User Tax  for <?php echo e($user->name); ?> <?php echo e($user->l_name); ?> </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="<?php echo e(route('usertax')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-group">
                         <h5 class=" ">On/Off</h5>
                         <select class="form-control" name="taxtype">
                             <option value="" selected disabled></option>

                                 <option value="on">On</option>
                                 <option value="off">Off</option>

                         </select>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Amount</h5>
                         <input type="number" name="taxamount" class="form-control  ">
                     </div>

                     <div class="form-group">
                         <input type="submit" class="btn " value="Add User Tax">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>



<!-- Clear account Modal -->
<div id="clearacctModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Clear Account</strong></h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <p class="">You are clearing account for <?php echo e($user->name); ?> to <?php echo e($user->currency); ?>0.00
                </p>
                <a class="btn " href="<?php echo e(url('admin/dashboard/clearacct')); ?>/<?php echo e($user->id); ?>">Proceed</a>
            </div>
        </div>
    </div>
</div>


<div id="withdrawalcode" class="modal fade" role="dialog">
    <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Enter <?php echo e($user->name); ?> <?php echo e($user->l_name); ?> Withdrawal Code </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="<?php echo e(route('withdrawalcode')); ?>">
                     <?php echo csrf_field(); ?>
                      <div class="form-group">
                         <h5 class=" ">Select Withdrawal Code Status</h5>
                         <select class="form-control  " name="withdrawal_code">


                                 <option value="on">On</option>
                                  <option value="off">Off</option>

                         </select>
                     </div>

                     <div class="form-group">
                         <h5 class=" ">Withdrawal Code</h5>
                         <input type="text" name="user_withdrawalcode" class="form-control" value="<?php echo e($user->user_withdrawalcode); ?>">
                     </div>

                     <div class="form-group">
                         <input type="submit" class="btn " value="Set User Withdrawal Code">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 </div>
<!-- /Clear account Modal -->
 <!-- send a single user email Modal-->
 <div id="sendmailtooneuserModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Send Email</h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">This message will be sent to <?php echo e($user->name); ?></p>
                 <form style="padding:3px;" role="form" method="post" action="<?php echo e(route('sendmailtooneuser')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class=" form-group">
                         <input type="text" name="subject" class="form-control  " placeholder="Subject" required>
                     </div>
                     <div class=" form-group">
                         <textarea placeholder="Type your message here" class="form-control  " name="message" row="8"
                             placeholder="Type your message here" required></textarea>
                     </div>
                     <div class=" form-group">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                         <input type="submit" class="btn " value="Send">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /Trading History Modal -->

 <div id="TradingModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Trade for <?php echo e($user->name); ?> <?php echo e($user->l_name); ?> </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="<?php echo e(route('addhistory')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-group">
                        <h5 class=" ">Amount</h5>
                        <input type="number" name="amount" class="form-control  " placeholder="Enter trade amount <?php echo e($user->currency); ?>" required>
                    </div>
                     <div class="form-group">
                         <h5 class=" ">Select Asset</h5>

                         <select class="form-control  " name="plan" required>
                             <option value="" selected disabled>Select Asset</option>
                             <optgroup label="Currency">
                                <option selected>EURUSD</option>
                                <option>EURJPY</option>
                                <option>USDJPY</option>
                                <option>USDCAD</option>
                                <option>AUDUSD</option>
                                <option>AUDJPY</option>
                                <option>NZDUSD</option>
                                <option>GBPUSD</option>
                                <option>GBPJPY</option>
                                <option>USDCHF</option>
                            </optgroup>
                            <optgroup label="Crypto-Currency">
                                <option>BTCUSD</option>
                                <option>ETHUSD</option>
                                <option>BCHUSD</option>
                                <option>XRPUSD</option>
                                <option>LTCUSD</option>
                                <option>ETHBTC</option>
                            </optgroup>
                            <optgroup label="Stocks">
                                <option>CITI</option>
                                <option>SNAP</option>
                                <option>EA</option>
                                <option>MSFT</option>
                                <option>CSCO</option>
                                <option>GOOG</option>
                                <option>FB</option>
                                <option>SBUX</option>
                                <option>INTC</option>
                            </optgroup>
                            <optgroup label="Indices">
                                <option>SPX500USD</option>
                                <option>MXX</option>
                                <option>XAX</option>
                                <option>INDEX:STI</option>
                            </optgroup>
                            <optgroup label="Commodities">
                                <option>GOLD</option>
                                <option>RB1!</option>
                                <option>USOIL</option>
                                <option>SILVER</option>
                            </optgroup>
                         </select>
                     </div>


                     <div class="form-group">
                        <select class="form-control" name="leverage" id="leverage" required>
                            <option selected disable value="">Leverage</option><option value="10">1:10</option><option value="20">1:20</option><option value="30">1:30</option><option value="40">1:40</option><option value="50">1:50</option><option value="60">1:60</option><option value="70">1:70</option><option value="80">1:80</option><option value="90">1:90</option><option value="100">1:100</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="expire" id="expire" required>
                            <option selected disable value="">Expiration</option>
                            <option value="1 Minutes">1 Minute</option>
                            <option value="5 Minutes">5 Minutes</option>
                            <option value="15 Minutes">15 Minutes</option>
                            <option value="30 Minutes">30 Minutes</option>
                            <option value="60 Minutes">1 Hour</option>
                            <option value="4 Hours">4 Hours</option>
                            <option value="1 Days">1 Day</option>
                            <option value="2 Days">2 Days</option>
                            <option value="7 Days">7 Days</option>
                        </select>
                    </div>
                     <div class="form-group">
                         <h5 class=" ">Profit/Loss</h5>
                         <select class="form-control  " name="type" required>
                             <option value="" selected disabled>Select type  profit/loss</option>
                             <option value="WIN">Profit</option>
                             <option value="LOSE">Loss</option>
                         </select>
                     </div>

                     <div class="form-group">
                        <h5 class=" ">Trade Type</h5>
                        <select class="form-control  " name="tradetype" required>
                            <option value="" selected disabled>Select type  Buy/Sell</option>
                            <option value="Buy">Buy</option>
                            <option value="Sell">Sell</option>
                        </select>
                    </div>
                     <div class="form-group">
                         <input type="submit" class="btn btn-primary" value="Trade Now">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /send a single user email Modal -->



 

 <div id="Signal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Create Signal for <?php echo e($user->name); ?> <?php echo e($user->l_name); ?> </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form role="form" method="post" action="<?php echo e(route('addsignalhistory')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <h5 class=" ">Select Asset</h5>

                        <select class="form-control  " name="asset" required>
                            <option value="" selected disabled>Select Asset</option>
                            <optgroup label="Currency">
                               <option selected>EURUSD</option>
                               <option>EURJPY</option>
                               <option>USDJPY</option>
                               <option>USDCAD</option>
                               <option>AUDUSD</option>
                               <option>AUDJPY</option>
                               <option>NZDUSD</option>
                               <option>GBPUSD</option>
                               <option>GBPJPY</option>
                               <option>USDCHF</option>
                           </optgroup>
                           <optgroup label="Crypto-Currency">
                               <option>BTCUSD</option>
                               <option>ETHUSD</option>
                               <option>BCHUSD</option>
                               <option>XRPUSD</option>
                               <option>LTCUSD</option>
                               <option>ETHBTC</option>
                           </optgroup>
                           <optgroup label="Stocks">
                               <option>CITI</option>
                               <option>SNAP</option>
                               <option>EA</option>
                               <option>MSFT</option>
                               <option>CSCO</option>
                               <option>GOOG</option>
                               <option>FB</option>
                               <option>SBUX</option>
                               <option>INTC</option>
                           </optgroup>
                           <optgroup label="Indices">
                               <option>SPX500USD</option>
                               <option>MXX</option>
                               <option>XAX</option>
                               <option>INDEX:STI</option>
                           </optgroup>
                           <optgroup label="Commodities">
                               <option>GOLD</option>
                               <option>RB1!</option>
                               <option>USOIL</option>
                               <option>SILVER</option>
                           </optgroup>
                        </select>
                    </div>


                    <div class="form-group">
                       <select class="form-control" name="leverage" id="leverage" required>
                           <option selected disable value="">Leverage</option><option value="10">1:10</option><option value="20">1:20</option><option value="30">1:30</option><option value="40">1:40</option><option value="50">1:50</option><option value="60">1:60</option><option value="70">1:70</option><option value="80">1:80</option><option value="90">1:90</option><option value="100">1:100</option>
                       </select>
                   </div>

                   <div class="form-group">
                    <h5 class=" ">Amount</h5>
                    <input type="number" name="amount" class="form-control  " placeholder="Enter amount required for signal in <?php echo e($user->currency); ?>" required>
                </div>
                   <div class="form-group">
                       <select class="form-control" name="expire"  required>
                           <option selected disable value="">Expiration</option>
                           <option value="1 Minutes">1 Minute</option>
                           <option value="5 Minutes">5 Minutes</option>
                           <option value="15 Minutes">15 Minutes</option>
                           <option value="30 Minutes">30 Minutes</option>
                           <option value="60 Minutes">1 Hour</option>
                           <option value="4 Hours">4 Hours</option>
                           <option value="1 Days">1 Day</option>
                           <option value="2 Days">2 Days</option>
                           <option value="7 Days">7 Days</option>
                       </select>
                   </div>
                    

                    <div class="form-group">
                       <h5 class=" ">Order Type</h5>
                       <select class="form-control  " name="order_type" required>
                           <option value="" selected disabled>Select type  Buy/Sell</option>
                           <option value="Buy">Buy</option>
                           <option value="Sell">Sell</option>
                       </select>
                   </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Create Signal">
                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 

 



<div id="Planhistory" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Add Trading History for <?php echo e($user->name); ?> <?php echo e($user->l_name); ?> </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form role="form" method="post" action="<?php echo e(route('addplanhistory')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <h5 class=" ">Select Investment Plan</h5>
                        <select class="form-control  " name="plan">
                            <option value="" selected disabled>Select Plan</option>
                            <?php $__currentLoopData = $pl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($plns->name); ?>"><?php echo e($plns->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5 class=" ">Amount</h5>
                        <input type="number" name="amount" class="form-control  ">
                    </div>
                    <div class="form-group">
                        <h5 class=" ">Type</h5>
                        <select class="form-control  " name="type">
                            <option value="" selected disabled>Select type</option>
                            <option value="Bonus">Bonus</option>
                            <option value="ROI">ROI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn " value="Add History">
                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 <!-- Edit user Modal -->
 <div id="edituser" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Edit <?php echo e($user->name); ?> details.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="<?php echo e(route('edituser')); ?>">
                     <div class="form-group">
                         <h5 class=" ">Username</h5>
                         <input class="form-control  " id="input1" value="<?php echo e($user->username); ?>" type="text"
                             name="username" required>
                         <small>Note: same username should be use in the referral link.</small>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Fullname</h5>
                         <input class="form-control  " value="<?php echo e($user->name); ?>" type="text" name="name"
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Email</h5>
                         <input class="form-control  " value="<?php echo e($user->email); ?>" type="text" name="email"
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Phone Number</h5>
                         <input class="form-control  " value="<?php echo e($user->phone); ?>" type="text" name="phone"
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Country</h5>
                         <input class="form-control  " value="<?php echo e($user->country); ?>" type="text" name="country">
                     </div>

                     <div class="form-group text-black-50 mt-3 ">
                <input name="s_currency" value="<?php echo e($user->currency); ?>" id="s_c" type="hidden">
                <div class="form-group ">
                    <select name="currency" id="select_c" class="form-control   select2" onchange="changecurr()"
                        style="width: 100%">
                        
                        <option value="<?php echo e($user->currency); ?>"><?php echo e($user->currency); ?></option>
                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="<?php echo e($key); ?>" value="<?php echo html_entity_decode($currency); ?>">
                                <?php echo e($key . ' (' . html_entity_decode($currency) . ')'); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
            </div>
        </div>
                     <div class="form-group">
                         <h5 class=" ">Referral link</h5>
                         <input class="form-control  " value="<?php echo e($user->ref_link); ?>" type="text" name="ref_link"
                             required>
                     </div>
                     <div class="form-group">
                         <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                         <input type="submit" class="btn " value="Update">
                     </div>
                 </form>
             </div>
             <script>
                 $('#input1').on('keypress', function(e) {
                     return e.which !== 32;
                 });
             </script>
         </div>
     </div>
 </div>
 <!-- /Edit user Modal -->

 <!-- Reset user password Modal -->
 <div id="resetpswdModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Reset Password</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">Are you sure you want to reset password for <?php echo e($user->name); ?> to <span
                         class="text-primary font-weight-bolder">user01236</span></p>
                 <a class="btn " href="<?php echo e(url('admin/dashboard/resetpswd')); ?>/<?php echo e($user->id); ?>">Reset Now</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Reset user password Modal -->


  <!-- Trading Progress Modal -->
  <div id="tradingProgressModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-<?php echo e($bg); ?>">
                <h4 class="modal-title text-<?php echo e($text); ?>">Set Trading Signal</strong></h4>

            </div>
            <div class="modal-body bg-<?php echo e($bg); ?>">
                <form role="form" method="post" action="<?php echo e(route('tradingprogress')); ?>">
                    <div class="form-group">
                        <h5 class=" text-<?php echo e($text); ?>">Trading Signal %</h5>
                        <input class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"  value="<?php echo e($user->progress); ?>" type="number" name="progress" required>
                         <small>Signal strength in %. For signal strength to show on user dashoard increase its value </small>
                    </div>


                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                        <input type="submit" class="btn btn-<?php echo e($text); ?>" value="Update Trading Signal">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Trading Progress Modal password Modal -->

 <!-- Switch useraccount Modal -->
 <div id="switchuserModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">You are about to login as <?php echo e($user->name); ?>.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <a class="btn btn-success"
                     href="<?php echo e(url('admin/dashboard/switchuser')); ?>/<?php echo e($user->id); ?>">Proceed</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Switch user account Modal -->

 <div id="notifyuser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Notify <?php echo e($user->username); ?> Dashboard</h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <p class="">This show notice on  <?php echo e($user->name); ?> Dashboard</p>
                <form style="padding:3px;" role="form" method="post" action="<?php echo e(route('notifyuser')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class=" form-group">
                        <label>Turn on/off  Dashboard Notification : <?php echo e($user->notify); ?></label>
                        <select class="form-control  " name="notifystatus">

                            <option value="on">On</option>
                                <option value="off">Off</option>

                        </select>
                    </div>
                    <div class=" form-group">
                        <textarea placeholder="Type your message here" class="form-control  " name="notify" row="8"
                            placeholder="Type your message here" required></textarea>
                    </div>
                    <div class=" form-group">
                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                        <input type="submit" class="btn " value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="ugpradePlanStatus" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Turn on/off <?php echo e($user->username); ?> Plan Upgrade status </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <p class="">This will show Upgrade Plan notice on  <?php echo e($user->name); ?> Dashboard</p>
                <form style="padding:3px;" role="form" method="post" action="<?php echo e(route('upgradeplanstatus')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class=" form-group">
                        <label>Turn on/off Plan Upgrade Status : <?php echo e($user->plan_status); ?></label>
                        <select class="form-control  " name="planstatus">

                            <option value="on">On</option>
                                <option value="off">Off</option>

                        </select>
                    </div>
                    <div class=" form-group">
                        <select class="form-control  " name="user_plan">
                          <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($plan->name); ?>"><?php echo e($plan->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </select>
                    </div>
                    <div class=" form-group">
                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                        <input type="submit" class="btn " value="Upgrade Plan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div id="ugpradeSignalStatus" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Turn on/off <?php echo e($user->username); ?> Signal Upgrade status </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <p class="">This will show Upgrade Signal notice on  <?php echo e($user->name); ?> Dashboard</p>
                <form style="padding:3px;" role="form" method="post" action="<?php echo e(route('upgradesignalstatus')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class=" form-group">
                        <label>Turn on/off Signal Upgrade Status : <?php echo e($user->signal_status); ?></label>
                        <select class="form-control  " name="signal_status">

                            <option value="on">On</option>
                                <option value="off">Off</option>

                        </select>
                    </div>
                    <div class=" form-group">
                        <select class="form-control  " name="user_signal">
                          <?php $__currentLoopData = $signals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($signal->name); ?>"><?php echo e($signal->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </select>
                    </div>
                    <div class=" form-group">
                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                        <input type="submit" class="btn " value="Upgrade Signal">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- Delete user Modal -->
 <div id="deleteModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">

                 <h4 class="modal-title ">Delete User</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body  p-3">
                 <p class="">Are you sure you want to delete <?php echo e($user->name); ?> Account? Everything associated
                     with this account will be loss.</p>
                 <a class="btn btn-danger" href="<?php echo e(url('admin/dashboard/delsystemuser')); ?>/<?php echo e($user->id); ?>">Yes
                     i'm sure</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Delete user Modal -->
<?php /**PATH /home/admin/web/assethub.live/public_html/resources/views/admin/Users/users_actions.blade.php ENDPATH**/ ?>