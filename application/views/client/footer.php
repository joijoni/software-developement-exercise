<footer class="footer-section footer-2">
        <div class="row footer-content">
            <div class="col-md-10 col-md-offset-1 footer-column">
                <p>tech4</p>
                <ul class="footer__nav-list">
                    <li class="footer__nav-item"><a href="#" class="footer__nav-link">About</a></li>
                    <li class="footer__nav-item"><a href="#" class="footer__nav-link">Blog</a></li>
                    <li class="footer__nav-item"><a href="#" class="footer__nav-link">Contact</a></li>
                    <li class="footer__nav-item"><a href="#" class="footer__nav-link">Privacy Policy</a></li>
                </ul>
                <ul class="social-icons">
                    <li><a href=""><i class="icon-facebook"></i></a></li>
                    <li><a href=""><i class="icon-twitter"></i></a></li>
                    <li><a href=""><i class="icon-linkedin"></i></a></li>
                    <li><a href=""><i class="icon-dribbble"></i></a></li>
                    <li><a href=""><i class="icon-googleplus"></i></a></li>
                </ul>
                <div class="copyright-2">

                    &copy; tech4. All Rights Reserved.
                </div>
            </div>
        </div>
        <!-- SCROLL UP -->
        <div class="scroll-up">
            <a class="theme-color-bg" href="#home"><i class="fa fa-angle-up"></i></a>
        </div>
    </footer>
    <!-- /END FOOTER -->

    <!-- =========================
            SCRIPTS
            ============================== -->
    <script src="<?= base_url('assets/js/jquery-migrate-3.0.0.js');?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="<?= base_url('assets/js/modernizr.custom.js');?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/js/smoothscroll.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.scrollTo.min.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.localScroll.min.js');?>"></script>
    <script src="<?= base_url('assets/js/owl.carousel.min.js');?>"></script>
    <script src="<?= base_url('assets/js/isotope.pkgd.min.js');?>"></script>
    <script src="<?= base_url('assets/js/waypoints.min.js');?>"></script>
    <script src="<?= base_url('assets/js/wow.min.js');?>"></script>
    <script src="<?= base_url('assets/js/parallax.min.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.nav.js');?>"></script>
    <script src="<?= base_url('assets/js/matchMedia.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.fitvids.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.countTo.js');?>"></script>
    <script src="<?= base_url('assets/js/nivo-lightbox.min.js');?>"></script>
    <script src="<?= base_url('assets/js/classie.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.ajaxchimp.js');?>"></script>
    <script src="<?= base_url('assets/js/pathLoader.js');?>"></script>
    <script src="<?= base_url('assets/js/custom.js');?>"></script>

    </body>

</html>


<style>
    .place_order_button:hover{
        background-color: white;
        color: #082042;
        border: 2px solid #082042;
        font-weight:500
    }
    .place_order_button{
        border:none; 
        background-color:#082042;
        color:white;
        font-weight:500;
    }

    /* #rate_order{
        color:#082042;
        font-weight:bold
    } */
    
    tr td{
        padding:5px
    }

    table.dataTable tr:nth-child(even){
        background-color: #efefef
    }

    tr td:hover{
        height:90px
    }

    .swal-button{
        background-color:#082042;
        color:white;
    }

    .collapsible {
        background-color: #777;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .active, .collapsible:hover {
        background-color: #082042;
    }

    .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
    }

    input{
        color: #082042!important
    }
</style>

<script>
	$(document).ready(function () {
        $('.place_order_button').on('click', function(e){
            $('#order').css({'opacity':'0.6', 'pointer-events':'none'})
            $(this).text('Placing Order...').css({'background-color':'white', 'color':'#082042', 'border':'2px solid #082042' })
            var techID = $(this).data('tech-id')
            var orderText = $(this).data('order-text')

            var self_this = $(this)
            
            $.ajax({
                url: '',
                type: 'POST',
                data: {
                    techID: techID,
                    placeOrder: 1
                },
                success: function (data) {
                    data = JSON.parse(data)
                    console.log(data);
                    if(data.status){
                        $('#recent_orders_list').html(data.html)
                        swal({
                            title: "Great!",
                            text: "New Order Created!",
                            icon: "success",
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#082042',
                        });

                        setTimeout(() => {
                            $('html, body').animate({
                                'scrollTop' : $("#recent-orders").position().top
                            });    

                            $('#order').css({'opacity':1, 'pointer-events':''})
                            self_this.text(orderText).css({'background-color':'#082042', 'color':'#FFFFFF', 'border':'none' })
                        }, 1000);

                    }else{
                        alert('An error occured. Order Could not be created')
                    }
                }
            });
        })

        $(document).on("click", ".rate_tech_button", function () {
            var tech_name = $(this).data('tech-name');
            console.log(tech_name);
            $("#tech-to-rate-name").val(tech_name);
            
            var tech_id = $(this).data('tech-id');
            console.log(tech_id);
            $("#tech-to-rate-id").val(tech_id);
        });        
    });

    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
        content.style.display = "none";
        } else {
        content.style.display = "block";
        }
    });
    }

    //handle login click
    $('.login_button').on('click', function(){
        $('#login').show()
        $('#register').hide()

        $('html, body').animate({
            'scrollTop' : $("#login").position().top
        });
    })
    $('.register_button').on('click', function(){
        $('#register').show()
        $('#login').hide()

        $('html, body').animate({
            'scrollTop' : $("#register").position().top
        });
    })

    //handle logout
    $('#logout').on('click', function(){
        swal({
            title: "Hello <?= $_SESSION['user_name'] ?>!",
            text: "Are you sure you want to Logout",
            icon: "warning",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            html:true,
            buttons: ['No, Thanks', 'Yes Logout' ],
            closeOnConfirm: false
        }
        );

        setTimeout(() => {
            $('.swal-button--confirm').on('click', function(){
                window.location.replace('client/logout');
            })
        }, 1000);
    
    })
    
    $(document).ready( function () {
        $('table').DataTable();
    } );
</script>