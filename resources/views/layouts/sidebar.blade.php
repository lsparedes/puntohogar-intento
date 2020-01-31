<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">

        <ul class="navigation-left">
                <!-- <li class="nav-item">
                <a class="nav-item-hold" href="" target="_blank">
                      <i class="nav-icon i-Shop"></i>
                    <span class="nav-text">Portal ventas</span>
                </a>
                <div class="triangle"></div>
            </li> -->
                <!-- <li class="nav-item">
                <a class="nav-item-hold" href="" target="_blank">
                     <i class="nav-icon i-Coin"></i>
                    <span class="nav-text">Ventas</span>
                </a>
                <div class="triangle"></div>
            </li> -->

            <!-- <li class="nav-item {{ request()->is('extrakits/*') ? 'active' : '' }}" data-item="extrakits">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Shopping-Bag"></i>
                    <span class="nav-text">Compras</span>
                </a>
                <div class="triangle"></div>
            </li> -->

            <li class="nav-item {{ request()->is('productos/*') ? 'active' : '' }}" data-item="productos">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Gear"></i>
                    <span class="nav-text">Configuración</span>
                </a>
                <div class="triangle"></div>
            </li>

        </ul>
    </div>

   <!-- <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">


  <ul class="childNav" data-parent="extrakits">

            <li class="nav-item">
                <a>
                    <i class="nav-icon i-Arrow-Next"></i>
                    <span class="item-name">Nueva compra</span>

                </a>
            </li>
            <li class="nav-item">
                <a >
                    <i class="nav-icon i-Speach-Bubble-2"></i>
                    <span class="item-name">Ver todas</span>
                </a>
            </li>


        </ul>
    </div> -->
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">


   <ul class="childNav" data-parent="productos">

             <li class="nav-item">
                 <a href="{{route('modelos')}}">
                  <i class="nav-icon i-Car mr-1"></i>
                     <span class="item-name">Modelos</span>

                 </a>
             </li>
             <li class="nav-item">
                 <a  href="{{route('marcas')}}">
                     <i class="nav-icon i-Tag"></i>
                     <span class="item-name">Marcas</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a >
                     <i class="nav-icon i-Male"></i>
                     <span class="item-name">Familia</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a >
                     <i class="nav-icon i-Affiliate"></i>
                     <span class="item-name">Sub familia</span>
                 </a>
             </li>


         </ul>
     </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
