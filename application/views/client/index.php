    <!-- =========================
     Order
============================== -->
    <section class="section-top feature-bg-cl pad-bot-60" id="order">
        <div class="container">
            <!-- Feature SECTION HEADER -->
            <div class="section-header-2 wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeIn;">
                <!--  SECTION TITLE -->
                <div class="section-description">
                    Order Technologies
                </div>
            </div>
            <!-- /END Feature SECTION HEADER -->

            <div class="jv-st-srv">
                <div class="row">
                    <?php foreach ($prod_tech->result() as $row) {?>
                        <div class="col-md-4">
                            <div class="featured-item-2 text-center m-bot-40">
                                <div class="title text-uppercase">
                                    <h4><?= $row->tech_name;?></h4>
                                </div>
                                <div class="jv-st-desc">
                                    <?= $row->tech_description;?>
                                </div>

                                <div style="margin-top:15px">
                                    <p>
                                        <button class="rate_tech_button" data-tech-id="<?= $row->tech_ID;?>" data-tech-name="<?= $row->tech_name;?>" style="padding:5px; width:150px;" data-toggle="modal" data-target="#ModalExample">RATE</button>
                                    </p>
                                    <p>
                                        <button data-order-text="ORDER <?= '£' . $row->tech_RRP;?>" data-tech-id="<?= $row->tech_ID;?>" class="place_order_button" style="padding:5px; width:150px;">ORDER <?= '£' . $row->tech_RRP;?></button>   
                                    </p>                                 
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    <!-- /END CONTAINER -->

    <!-- Modal HTML Markup -->
    <div id="ModalExample" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rate this technology</h4>
                </div>
                <div class="modal-body">
                    
                    <form role="form" method="POST" action="">
                        <input type="hidden" name="_token" value="">
                        <input type="hidden" id="tech-to-rate-id" value="">
                        <div class="form-group row">
                            <label for="tech-to-rate-name" class="col-sm-2 col-form-label">Technology</label>
                            <div class="col-sm-10">
                            <input type="text" disabled="disabled" class="form-control" id="tech-to-rate-name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rating-score" class="col-sm-2 col-form-label">Score*</label>
                            <div class="col-sm-10">
                                <select id="rating-score" class="form-control">
                                    <option selected>-- Select Score --</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rating-usage" class="col-sm-2 col-form-label">Usage*</label>
                            <div class="col-sm-10">
                                <select id="rating-usage" class="form-control">
                                    <option selected>-- Select Usage --</option>
                                    <option>I have used this technology</option>
                                    <option>I am not interested in this technology</option>
                                    <option>I would like to use this technology</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rating-comments" class="col-sm-2 col-form-label">Comments*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="rating-comments" rows="3"></textarea>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    </section>
    <!-- /END order SECTION -->

    <!--- RECENT ORDERS --->
    <section class="section-top feature-bg-cl pad-bot-60" id="recent-orders">
        <a id="recent-orders"></a>
        <div class="container">
            <!-- Recent Orders SECTION HEADER -->
            <div class="section-header-2 wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeIn;">
                <!--  SECTION TITLE -->
                <div class="section-description">
                    My Recent Orders
                </div>
            </div>
            <!-- /END Recent Order SECTION HEADER -->
        
            <div class="jv-st-srv">
                <table width="100%">
                    <thead>
                        <tr style="border-bottom:1px solid #082042">
                            <th>Date</th>
                            <th class="text-center">Technology</th>
                            <th class="text-center">Tech Setup</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Assigned Developer</th>
                            <th class="text-center">Rating</th>
                        </tr>
                    </thead>

                    <tbody id="recent_orders_list">
                        <?php 
                            if($recent_orders->num_rows > 0){
                                foreach ($recent_orders->result() as $row) { ?>
                                    <tr>
                                        <td class="text-left"><?= $row->order_placed_on ?></td>
                                        <td><?= $row->tech_name ?></td>
                                        <td><?= $row->tech_setup ?></td>
                                        <td><?= '£' . $row->tech_RRP ?></td>
                                        <td><?= $row->dev_Name ?></td>
                                        <td><?= !empty($row->rating_score) ? 'Rating Score - <b>' .  $row->rating_score . '</b><br> ('. $row->rating_usage . ') <br> Comment: '. $row->rating_comments : 'N/A';?></td>
                                    </tr>
                        <?php   }
                            }else{ ?>
                                <tr>
                                    <td colspan="6">You haven't placed any order yet</td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </section>

  
    <!-- =========================
         FAQ
    ============================== -->

    <section class=" pad-top-100 pad-bot-60" id="faq">
        <div class="container">
            <!-- FAQ SECTION HEADER -->
            <div class="section-header-2 wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeIn;">
                <!--  SECTION TITLE -->
                <div class="section-description">
                    FAQ
                </div>
            </div>

            <div class="row">
                <?php foreach($faq->result() as $row){?>
                    <button type="button" class="collapsible"><?= $row->faq_question; ?></button>
                    <div class="content">
                    <p><?= $row->faq_answer; ?></p>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>