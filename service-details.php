<?php
    if (isset($_GET['service'])) {
        $service = $_GET['service'];

        if ($service == 'ocean') {
            $title = "Ocean Freight";
            $desc = "EuanchorDispatch Logistics provides full ocean freight service to move your commercial and project cargo all over the world. We leverage our long-standing relationships with our carrier partners to provide you with efficient and economical solutions for all your shipping needs. <br /> <br />

            Our extensive network of Full Container Load (FCL) carriers can accommodate almost any shipment. Our freight consolidation service offers the flexibility to tailor to your individual cargo needs. We handle all types of freight, whether containerized or not, including automobiles, commercial and general cargo. <br /> <br />
            
            EuanchorDispatch Logistics is a one-stop shop, offering intermodal transport solutions to accommodate any supply chain. We coordinate inland transportation for the door-to-door collection and delivery of your freight in a timely manner. We provide packing services, and our team of customs brokerage experts facilitate customs clearance and document handling. All of our integrated services are supported by web-based tracking systems, ensuring the visibility of your shipment every step of its journey. <br /> <br />
            
            Whether your shipment is big or small, personal or commercial, our shipping agents will work with you one-on-one to secure the most efficient and cost-effective ocean freight solution.";

        } else if ($service == 'air') {
            $title = "Air Freight";
            $desc = "Over our wide network of air routes, EuanchorDispatch Logistics can deliver your cargo anywhere in the world in a matter of hours. We offer direct service from most major US airports, ensuring the safe delivery of your air freight on time, every time. <br /> <br />

            Whether you require large-scale, multipoint air freight distribution and supply chain management, or single door-to-door air freight shipments, our experts will work closely with you to find the quickest, most reliable and cost-efficient route to ship your commercial goods. <br /> <br />
            
            Our service doesn’t stop on the runway. Our shipping agents can arrange for multimodal transport of your shipment to and from the airport, provide warehousing, packing and labeling services, and coordinate customs clearance through our customs brokerage. We provide online tracking access so you can monitor your shipment from pickup to delivery. <br /> <br />
            
            EuanchorDispatch Logistics is IAC and IATA Dangerous Goods certified, and no shipment is too big or small. When you need the fastest, most direct connection for your goods, our air freight service is your best choice.";
        } else if ($service == 'roadandrail') {
            $title = "Road & Rail Freight";
            $desc = "EuanchorDispatch Logistics provides a full range of rail and road freight services to meet the needs of all types of business and freight, from single-container loads to multiple-container network distribution. <br /> <br />

            Our transport networks provide reliable countrywide coverage, offering you the fastest point-to-point cross-country road and rail transport available. We provide both Full Truck Load (FTL) and Less than Truck Load (LTL) services, giving you maximum flexibility of options for your consignment. Our land services extend beyond container and break-bulk cargo shipment, including customs clearance, terminal handling and inland distribution. Our experienced shipping agents will arrange for door-to-door collection and delivery of your goods, whether they are containerized or boxed. <br /> <br />
            
            At EuanchorDispatch Logistics, we can arrange shipping services in most countries, as well as integrate your shipment with other freight services we offer, such as ocean and air. Our road and rail freight agents will help you choose the best way to move your freight, on time and on budget.";
        }
    }
?>

<?php require_once 'components/header.php'; ?>
    
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/banner/breadcrumb.png')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">SERVICES DETAILS</h2>
                            <ul class="page-list">
                                <li><a href="index.html">Home</a></li>
                                <li>Services Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->  

    <!-- service area start -->
    <div class="service-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="service-details-wrap">
                        <h2><?= $title; ?></h2>
                        <p><?= $desc; ?></p>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!-- footer area start  -->
    <?php require_once 'components/footer.php'; ?>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="assets/js/vendor.js"></script>
    <!-- main js  -->
    <script src="assets/js/main.js"></script>
</body>
</html>