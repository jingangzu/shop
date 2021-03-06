<!DOCTYPE html>
<html>
  <head>
    <title>我的订单</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/car/css/main.css" />
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/car/js/library/bootstrap.min.js"></script>
    <script src="/car/js/function-check-viewport.js"></script>
    <script src="/car/js/library/slick.min.js"></script>
    <script src="/car/js/library/select2.full.min.js"></script>
    <script src="/car/js/library/imagesloaded.pkgd.min.js"></script>
    <script src="/car/js/library/jquery.mmenu.all.min.js"></script>
    <script src="/car/js/library/rellax.min.js"></script>
    <script src="/car/js/library/isotope.pkgd.min.js"></script>
    <script src="/car/js/library/bootstrap-notify.min.js"></script>
    <script src="/car/js/library/bootstrap-slider.js"></script>
    <script src="/car/js/library/in-view.min.js"></script>
    <script src="/car/js/library/countUp.js"></script>
    <script src="/car/js/library/animsition.min.js"></script>
    <script src="/car/js/global.js"></script>
    <script src="/car/js/config-mm-menu.js"></script>
     

    
  </head>
  <body class="animsition">
    <div class="shop-cart" id="page">
      <nav id="menu">

        
      </nav>
      <header class="header-style-1 static">
        <div class="container" >
          <div class="row">
            <div class="header-1-inner">
              <a class="brand-logo animsition-link" href="index.html">
                <img class="img-responsive" src="/car/images/151695166217776.jpg" alt="" />
              </a>
              <nav>

                <ul class="menu hidden-xs" style="float:right">
                  <li><a href="{{ url('/') }}">主页</a></li>
                  <li><a href="shop.html">个人信息</a></li>
                  <li><a href="shop-detail.html">店铺信息</a><li>
                  <li><a href="{{url('/index/shoulist')}}">收藏</a></li>
                  <!-- <li><a href="shop-cart.html">Shop Cart</a></li> -->
                  <li><a href="check-out.html">Checkout</a></li>

          @if(empty(session('inuser')))
            <li>
            <a href="/index/login">
            <br/>登录</a>
            </li>
            
            <li><a href="{{ url('/index/user/register') }}">注册</a></li>
            @else

            <li>
            <a href="#">{{ session('inuser')->name }}</a>
          
            
            </li>

            <li>
            <a href="index/user/loginout"><br>退出</a>
            </li>

    
            @endif
                </ul>
              </nav>
              
            </div>
          </div>
        </div>
      </header>
      <section class="sub-header shop-detail-1">
        <img class="rellax bg-overlay" src="/car/images/151695166217776.jpg" alt="">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">我的订单</h3>
      </section>
      <section class="boxed-sm">
        <div class="container">
          <div class="woocommerce">
            <form class="woocommerce-cart-form">
              <table class="woocommerce-cart-table">
                <thead>
                  <tr>
                    <th class="product-thumbnail">编号</th>
                    <th class="product-name">订单号</th>
                   
                    <th class="product-quantity">商品图片</th>
                    <th class="product-price">金额</th>
                    <th class="product-subtotal">数量</th>
                    <th class="product-remove">物流状态</th>
                   
                  </tr>
                </thead>
                <tbody>
                 @foreach($goods as $k =>$v)
                    <td class="product-thumbnail">
                     {{$v->id}}
                    </td>
                    <td class="product-thumbnail">
                    {{$v->o_code}}
                    </td>
                    <td class="product-thumbnail">
                     <img style="width:70px" src="/uploads/{{$v->orgoods->picture}}">
                    </td>
                    <td class="product-name" data-title="Product">
                      {{$v->price}}
                    </td>
                    
                    <td class="product-quantity" data-title="Quantity">
                     {{$v->num}}
                    </td>
                    <td class="product-price" data-title="Price">
                    @if($v->ostate==0)
                           待发货
                    @elseif($v->ostate==1)
                          已发货
                    @endif</td>
                   
                
                 </td>
                  </tr>
                  <script type="text/javascript">
                        $('.qty').on('change',function(){
                           var count=$(this).val();
                           var zong=count * {{$v['goods']['goods_price']}};
                           $('#zong').text(zong);
                        });

                  </script>
                  
                @endforeach
             
                </tbody>
 <script>
        function delUser(id){
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //向服务器发送ajax请求，删除当前id对应的用户数据
                $.post('{{ url('home/ordersub/geren') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                    if(data.status == 0){
                        layer.msg(data.message, {icon: 6});
                        setTimeout(function(){
                            window.location.href = location.href;
                        },1000);


                    }else{
                        layer.msg(data.message, {icon: 5});

                        window.location.href = location.href;
                    }

                })

//
            }, function(){

            });
        }
    </script>
                <tfoot>
                  <tr>
                    <td colspan="7">
                      <div class="form-coupon organic-form">
                        <div class="form-group">
                          
                        </div>
                        <div class="form-group">
                         
                        </div>
                        <script type="text/javascript">
                          $('#btn').on('click',function(){ 
                            var count=$('.qty').val();

                            $('#btn').attr('href',"{{  url('home/ordersub').'/'.$v['goods']['id'].'/' }}"+count);

                          })
                        </script>

                        <div class="form-group update-cart">
                          <a class="btn btn-brand-ghost pill" href="{{ url('/home/shopcar/syncCart')}}">更新我的订单</a>
                        </div>
                      </div>

                    </td>
                  </tr>
                </tfoot>
              </table>
            </form>
  <script>
    function delcart(id){


        if(id != ''){

            if(!confirm('您确认要删除吗?')){return false;}
            $.ajax({
                type:"POST",
                url : "{{url('/home/shopcar/delcart')}}",
                dataType: 'json',
                data:{id:id,_token:"{{csrf_token()}}"},
                success:function(msg){
                    if(msg.status == 1){
                        alert(msg.msg);
                        window.location.reload();
                    }else{
                        alert(msg.msg);
                    }
                }
            });
        }
    }

</script>


            <div class="cart_totals">
             <!--  <h3 class="title">购物车结算</h3>
              <div class="row">
                <div class="col-md-8">
                  <table class="woocommerce-cart-subtotal">
                    <tbody>
                      <tr>
                        <th>小计</th>
                        <td data-title="Subtotal">$6.31</td>
                      </tr>
                      <tr>
                        <th>结算</th>
                        <td data-title="Total">$6.31</td>
                      </tr> -->
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="footer-style-1">
      <div class="container">
        <div class="row">
          <div class="footer-style-1-inner">
            <div class="widget-footer widget-text col-first col-small">
              <a href="#">
                <img class="logo-footer" src="/car/images/logo.png" alt="Logo Organic" />
              </a>
              <div class="widget-link">
                <ul>
                  <li>
                    <span class="lnr lnr-map-marker icon"></span>
                    <span>379 5th Ave New York, NYC 10018</span>
                  </li>
                  <li>
                    <span class="lnr lnr-phone-handset icon"></span>
                    <a href="tel:0123456789">(+1) 96 716 6879</a>
                  </li>
                  <li>
                    <span class="lnr lnr-envelope icon"></span>
                    <a href="mailto: contact@site.com">contact@site.com </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget-footer widget-link col-second col-medium">
              <div class="list-link">
                <h4 class="h4 heading">SHOP</h4>
                <ul>
                  <li>
                    <a href="#">Food</a>
                  </li>
                  <li>
                    <a href="#">Farm</a>
                  </li>
                  <li>
                    <a href="#">Health</a>
                  </li>
                  <li>
                    <a href="#">Organic</a>
                  </li>
                </ul>
              </div>
              <div class="list-link">
                <h4 class="h4 heading">SUPPORT</h4>
                <ul>
                  <li>
                    <a href="#">Contact Us</a>
                  </li>
                  <li>
                    <a href="#">FAQ</a>
                  </li>
                  <li>
                    <a href="#">Privacy Policy</a>
                  </li>
                  <li>
                    <a href="#">Blog</a>
                  </li>
                </ul>
              </div>
              <div class="list-link">
                <h4 class="h4 heading">MY ACCOUNT</h4>
                <ul>
                  <li>
                    <a href="#">Sign In</a>
                  </li>
                  <li>
                    <a href="#">My Cart</a>
                  </li>
                  <li>
                    <a href="#">My Wishlist</a>
                  </li>
                  <li>
                    <a href="#">Check Out</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget-footer widget-newsletter-footer col-last col-small">
              <h4 class="h4 heading">NEWSLETTER</h4>
              <p>Subscribe now to get daily updates</p>
              <form class="organic-form form-inline btn-add-on circle border">
                <div class="form-group">
                  <input class="form-control pill transparent" placeholder="Your Email..." type="email" />
                  <button class="btn btn-brand circle" type="submit">
                    <i class="fa fa-envelope-o"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copy-right style-1">
        <div class="container">
          <div class="row">
            
          </div>
        </div>
      </div>
    </footer>
    <div class="modal fade" id="quick-view-product" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal-quickview woocommerce" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="woocommerce-product-gallery">
                  <div class="main-carousel-product-quick-view">
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/01.jpg" alt="product thumbnail" />
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/02.jpg" alt="product thumbnail" />
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/03.jpg" alt="product thumbnail" />
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/04.jpg" alt="product thumbnail" />
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/05.jpg" alt="product thumbnail" />
                    </div>
                  </div>
                  <div class="thumbnail-carousel-product-quickview">
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/01.jpg" alt="product thumbnail" />
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/02.jpg" alt="product thumbnail" />
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/03.jpg" alt="product thumbnail" />
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/04.jpg" alt="product thumbnail" />
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="/car/images/product/05.jpg" alt="product thumbnail" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="summary">
                  <div class="desc">
                    <div class="header-desc">
                      <h2 class="product-title">Sald</h2>
                      <p class="price">$2.00</p>
                    </div>
                    <div class="body-desc">
                      <div class="woocommerce-product-details-short-description">
                        <p>Duis vestibulum ante velit. Pellentesque orci felis, pharetra ut pharetra ut, interdum at mauris. Aenean efficitur aliquet libero sit amet scelerisque. Suspendisse efficitur mollis eleifend. Aliquam tortor nibh, venenatis quis
                          sem dapibus, varius egestas lorem a sollicitudin. </p>
                      </div>
                    </div>
                    <div class="footer-desc">
                      <form class="cart">
                        <div class="quantity buttons-added">
                          <input class="minus" value="-" type="button" />
                          <input class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number" />
                          <input class="plus" value="+" type="button" />
                        </div>
                        <div class="group-btn-control-wrapper">
                          <button class="btn btn-brand no-radius">ADD TO CART</button>
                          <button class="btn btn-wishlist btn-brand-ghost no-radius">
                            <i class="fa fa-heart"></i>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="product-meta">
                    <p class="posted-in">Categories:
                      <a href="#" rel="tag">Food</a>
                    </p>
                    <p class="tagged-as">Tags:
                      <a href="#" rel="tag">Natural</a>,
                      <a href="#" rel="tag">Organic</a>,
                      <a href="#" rel="tag">Health</a>,
                      <a href="#" rel="tag">Green</a>,
                      <a href="#" rel="tag">Vegetable</a>
                    </p>
                    <p class="id">ID:
                      <a href="#">A203</a>
                    </p>
                  </div>
                  <div class="widget-social align-left">
                    <ul>
                      <li>
                        <a class="facebook" data-toggle="tooltip" title="Facebook" href="http://www.facebook.com/authemes">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a class="pinterest" data-toggle="tooltip" title="Pinterest" href="http://www.pinterest.com/authemes">
                          <i class="fa fa-pinterest"></i>
                        </a>
                      </li>
                      <li>
                        <a class="twitter" data-toggle="tooltip" title="Twitter" href="http://www.twitter.com/authemes">
                          <i class="fa fa-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a class="google-plus" data-toggle="tooltip" title="Google Plus" href="https://plus.google.com/authemes">
                          <i class="fa fa-google-plus"></i>
                        </a>
                      </li>
                      <li>
                        <a class="instagram" data-toggle="tooltip" title="Instagram" href="https://instagram.com/authemes">
                          <i class="fa fa-instagram"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>

