@extends('layouts.app')
@section('title'){{ $services->service_meta_tag }}@endsection
@section('meta_description'){{ $services->service_meta_description }}@endsection

@section('meta')
    @if (Request::is('service/weee-recycling-services'))
        <meta property="og:title" content="WEEE Recycling | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://www.vdrresale.com/service/weee-recycling-services">
        <meta property="og:description" content="VDR Resale pride our WEEE Waste Recycling Services on being the most efficient and cost effective. Get a Quote Online for WEEE Waste Recycling Services.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60acc3f55bd02.png">
    @endif
    
    @if (Request::is('service/sell-cisco-equipment'))
        <meta property="og:title" content="Sell Used Cisco Equipment | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-used-cisco-equipment">
        <meta property="og:description" content="Sell your used Cisco Telephone equipment at VDR Resale at the proper market price. We will buy all your Cisco equipment. Get a Quote Online to Sell Old Cisco Equipment.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60acc9c4ae261.png">
    @endif
    
    @if (Request::is('service/sell-polycom-equipment'))
        <meta property="og:title" content="Sell Polycom Used Equipment | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-used-polycom-equipment">
        <meta property="og:description" content="Sell your used Polycom Telephone equipment at VDR Resale at the proper market price. We will buy all your Polycom equipment. Get a Quote to Sell Old Polycom Equipment.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60accb10dbdd1.png">
    @endif
    
    @if (Request::is('service/sell-juniper-equipment'))
        <meta property="og:title" content="Sell Juniper Network Equipment | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-juniper-equipment">
        <meta property="og:description" content="Sell your used Juniper Network equipment at VDR Resale at the proper market price. We will buy all your Juniper equipment. Get a Quote to Sell Juniper Equipment.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60ace59a426ae.png">
    @endif
    
    @if (Request::is('service/sell-used-phone-system'))
        <meta property="og:title" content="Sell Used Phone System | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://www.vdrresale.com/service/sell-used-phone-system">
        <meta property="og:description" content="Sell your used phone system at VDR Resale at the proper market price. We will buy all your old phone equipment. Get a Quote Online to Sell old phone system.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60ace59a426ae.png">
    @endif
    
    @if (Request::is('service/sell-ciena-equipment'))
        <meta property="og:title" content="Sell Ciena dwdm Equipment | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-ciena-equipment">
        <meta property="og:description" content="Sell your used sell Ciena at VDR Resale at the proper market price. We will buy all your Ciena equipment. Get a Quote to Sell Ciena Equipment.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60acedbc29a79.png">
    @endif
    
    @if (Request::is('service/sell-voip-systems'))
        <meta property="og:title" content="Sell business.business Voip Phone System | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-voip-systems">
        <meta property="og:description" content="Sell your used sell VOIP Phone System at VDR Resale at the proper market price. We will buy all your VOIP Telephone system. Get a Quote to sell VOIP System.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60acefd4747b6.png">
    @endif
    
    @if (Request::is('service/sell-your-mitel-phones-system'))
        <meta property="og:title" content="Sell Mitel Phone System | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-your-mitel-phones-system">
        <meta property="og:description" content="Sell your used sell Mitel Phone System at VDR Resale at the proper market price. We will buy all your Mitel system. Get a Quote to Sell Mitel Equipment.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60b109667487e.png">
    @endif
    
    @if (Request::is('service/sell-mitel-equipment'))
        <meta property="og:title" content="Sell Mitel Equipment | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-mitel-equipment">
        <meta property="og:description" content="Sell your used Mitel Telephone equipment at VDR Resale at the proper market price. We will buy all your Mitel equipment. Get a Quote Online to Sell Old Mitel Equipment.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60b104964213d.png">
    @endif
    
    @if (Request::is('service/sell-nortel-equipment'))
        <meta property="og:title" content="Sell Nortel Equipment | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-nortel-equipment">
        <meta property="og:description" content="Sell your used Nortel Telephone equipment at VDR Resale at the proper market price. We will buy all your Nortel equipment. Get a Quote Online to Sell Old Nortel Equipment.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60accb5e78d05.png">
    @endif
    
    @if (Request::is('service/sell-used-voip-phones'))
        <meta property="og:title" content="Sell Used Voip Phones | Vdr Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-used-voip-phones">
        <meta property="og:description" content="Sell your used VOIP Telephone at VDR Resale at the proper market price. We will buy all your VOIP Phones. Get a Quote Online to Sell Used VOIP Phones.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60b10878a684b.png">
    @endif
    
    @if (Request::is('service/data-centre-decommissioning'))
        <meta property="og:title" content="Data Center Decommissioning Services | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/data-centre-decommissioning">
        <meta property="og:description" content="We Offer Leading Data Center Decommissioning Services. Maintain a data center decommissioning plan. Maximise Cash Value of Your Data Center Equipment. ">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60b10a87eb615.png">
    @endif
    
    @if (Request::is('service/sell-cisco-switches'))
        <meta property="og:title" content="Sell Used Cisco Switches | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-cisco-switches">
        <meta property="og:description" content="Sell your used Cisco Switches at VDR Resale at the proper market price. We will buy all your Cisco Switches. Get a Quote Online for used Cisco Switches for sale.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60b10ba915285.png">
    @endif
    
    @if (Request::is('service/sell-used-mobile-phones'))
        <meta property="og:title" content="Sell Used Second Hand Phones | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://vdrresale.com/service/sell-used-second-hand-mobile-phones">
        <meta property="og:description" content="Sell your used Second Hand Phones at VDR Resale at the proper market price. We will buy all your Second Hand Phones. Get a Quote Online for used Phones for sale.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60aced1f58af3.png">
    @endif
    
    @if (Request::is('service/sell-it-equipment'))
        <meta property="og:title" content="Sell Your Excess IT Equipment | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://www.vdrresale.com/service/sell-it-equipment">
        <meta property="og:description" content="We make it easy to Sell Excess IT Equipment and can offer the best market prices. Free Collections. Earth Friendly Company. ">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/60acc85618780.png">
    @endif
    
    @if (Request::is('service/storage-warehouse-services'))
        <meta property="og:title" content="Storage & Warehouse Services | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://www.vdrresale.com/service/storage-warehouse-services">
        <meta property="og:description" content="VDR Resale offer Storage and Warehouse services from a great location near Stansted Airport. Learn more online.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/61fbf80384f8b.png">
    @endif
    
    @if (Request::is('service/secure-hard-drive-destruction'))
        <meta property="og:title" content="Secure Hard Drive Destruction & Shredding Services | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://www.vdrresale.com/service/secure-hard-drive-destruction">
        <meta property="og:description" content="Physical Hard Drive Destruction Services by VDR Resale, The Technology Recycling Experts. Contact Us Today To Learn More About Hard Drive Disposal. Bespoke Quotes & Pricing. ">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/61114661e83b9.png">
    @endif
    
    @if (Request::is('service/sell-cisco-routers'))
        <meta property="og:title" content="Sell Used Cisco Routers  | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://www.vdrresale.com/service/sell-cisco-routers">
        <meta property="og:description" content="Sell Used Cisco Routers at VDR Resale at the proper market price. We will buy all your Cisco Routers. Get a Quote to Sell Used Cisco Routers.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/6298b77b3af3a.png">
    @endif
    
    @if (Request::is('service/sell-used-cisco-phones'))
        <meta property="og:title" content="Sell Used Cisco Phones | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://www.vdrresale.com/service/sell-used-cisco-phones">
        <meta property="og:description" content="Sell Used Cisco Phones at VDR Resale at the proper market price. We will buy all your Cisco Phones. Get a Quote to Sell Used Cisco Phones.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/6299dea5b135a.png">
    @endif
    
    @if (Request::is('service/sell-cisco-ip-phones'))
        <meta property="og:title" content="Sell Cisco IP Phones | VDR Resale">
        <meta property="og:site_name" content="VDR Resale">
        <meta property="og:url" content="https://www.vdrresale.com/service/sell-cisco-ip-phones">
        <meta property="og:description" content="Sell Cisco ip Phones at VDR Resale at the proper market price. We will buy all your Cisco ip Phones. Get a Quote to Sell Cisco Voip Phones.">
        <meta property="og:type" content="business.business">
        <meta property="og:image" content="https://www.vdrresale.com/public/upload/service/6299ee4c6f7dd.png">
    @endif
@stop

@section('schema')
    @if (Request::is('service/weee-recycling-services'))
	    <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "WEEE Recycling Services",
          "url": "https://www.vdrresale.com/service/weee-recycling-services",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60acc3f55bd02.png",
          "description": "VDR Resale pride our WEEE Waste Recycling Services on being the most efficient and cost effective. Get a Quote Online for WEEE Waste Recycling Services.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
   @endif
   
    @if (Request::is('service/sell-cisco-equipment'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Used Cisco Equipment Services",
          "url": "https://vdrresale.com/service/sell-cisco-equipment",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60acc9c4ae261.png",
          "description": "Sell your used Cisco Telephone equipment at VDR Resale at the proper market price. We will buy all your Cisco equipment. Get a Quote Online to Sell Old Cisco Equipment.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-polycom-equipment'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Polycom Used Equipment services",
          "url": "https://www.vdrresale.com/service/sell-polycom-equipment",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60accb10dbdd1.png",
          "description": "Sell your used Polycom Telephone equipment at VDR Resale at the proper market price. We will buy all your Polycom equipment. Get a Quote to Sell Old Polycom Equipment.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-juniper-equipment'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Juniper Network Equipment services",
          "url": "https://www.vdrresale.com/service/sell-juniper-equipment",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60ace59a426ae.png",
          "description": "Sell your used Juniper Network equipment at VDR Resale at the proper market price. We will buy all your Juniper equipment. Get a Quote to Sell Juniper Equipment.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-used-phone-system'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Used Phone System services",
          "url": "https://www.vdrresale.com/service/sell-used-phone-system",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60ace59a426ae.png",
          "description": "Sell your used phone system at VDR Resale at the proper market price. We will buy all your old phone equipment. Get a Quote Online to Sell old phone system.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-ciena-equipment'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Ciena dwdm Equipment services",
          "url": "https://www.vdrresale.com/service/sell-ciena-equipment",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60acedbc29a79.png",
          "description": "Sell your used sell Ciena at VDR Resale at the proper market price. We will buy all your Ciena equipment. Get a Quote to Sell Ciena Equipment.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif  
    
    @if (Request::is('service/sell-voip-systems'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Business Voip Telephone System services",
          "url": "https://www.vdrresale.com/service/sell-voip-systems",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60acefd4747b6.png",
          "description": "Sell your used sell VOIP Phone System at VDR Resale at the proper market price. We will buy all your VOIP Telephone system. Get a Quote to sell VOIP System..",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-your-mitel-phones-system'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Mitel Phone System services",
          "url": "https://www.vdrresale.com/service/sell-your-mitel-phones-system",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60b109667487e.png",
          "description": "Sell your used sell Mitel Phone System at VDR Resale at the proper market price. We will buy all your Mitel system. Get a Quote to Sell Mitel Equipment.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-mitel-equipment'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Mitel Equipment services",
          "url": "https://www.vdrresale.com/service/sell-mitel-equipment",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60b104964213d.png",
          "description": "Sell your used Mitel Telephone equipment at VDR Resale at the proper market price. We will buy all your Mitel equipment. Get a Quote Online to Sell Old Mitel Equipment.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-nortel-equipment'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Nortel Equipment services",
          "url": "https://www.vdrresale.com/service/sell-nortel-equipment",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60accb5e78d05.png",
          "description": "Sell your used Nortel Telephone equipment at VDR Resale at the proper market price. We will buy all your Nortel equipment. Get a Quote Online to Sell Old Nortel Equipment.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-used-voip-phones'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Used Voip Phones services",
          "url": "https://www.vdrresale.com/service/sell-used-voip-phones",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60b10878a684b.png",
          "description": "Sell your used VOIP Telephone at VDR Resale at the proper market price. We will buy all your VOIP Phones. Get a Quote Online to Sell Used VOIP Phones.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/data-centre-decommissioning'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Data Center Decommissioning Services ",
          "url": "https://www.vdrresale.com/service/data-centre-decommissioning",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60b10ba915285.png",
          "description": "We Offer Leading Data Center Decommissioning Services. Maintain a data center decommissioning plan. Maximise Cash Value of Your Data Center Equipment.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-cisco-switches'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Used Cisco Switches Services ",
          "url": "https://www.vdrresale.com/service/sell-cisco-switches",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60b10ba915285.png",
          "description": "Sell your used Cisco Switches at VDR Resale at the proper market price. We will buy all your Cisco Switches. Get a Quote Online for used Cisco Switches for sale.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif 
    
    @if (Request::is('service/sell-used-mobile-phones'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Used Second Hand Phones Services ",
          "url": "https://www.vdrresale.com/service/sell-used-mobile-phones",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/60aced1f58af3.png",
          "description": "Sell your used Second Hand Phones at VDR Resale at the proper market price. We will buy all your Second Hand Phones. Get a Quote Online for used Phones for sale.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-it-equipment'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Your Excess IT Equipment",
          "url": "https://www.vdrresale.com/service/sell-it-equipment",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/assets/images/vdr-logo.png",
          "description": "We make it easy to Sell Excess IT Equipment and can offer the best market prices. Free Collections. Earth Friendly Company.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/storage-warehouse-services'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Storage & Warehouse Services ",
          "url": "https://www.vdrresale.com/service/storage-warehouse-services",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/61fbf80384f8b.png",
          "description": "VDR Resale offer Storage and Warehouse services from a great location near Stansted Airport. Learn more online.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/secure-hard-drive-destruction'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Secure Hard Drive Destruction & Shredding Services",
          "url": "https://www.vdrresale.com/service/secure-hard-drive-destruction",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/61114661e83b9.png",
          "description": "Physical Hard Drive Destruction Services by VDR Resale, The Technology Recycling Experts. Contact Us Today To Learn More About Hard Drive Disposal. Bespoke Quotes & Pricing. National Company with Multiple Sites Across The UK.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-cisco-routers'))
        <script type="application/ld+json">
        {
         "@context": "https://schema.org",
         "@type": "BreadcrumbList",
         "itemListElement":
         [
          {
           "@type": "ListItem",
           "position": 1,
           "item":
           {
            "@id": "https://www.vdrresale.com/",
            "name": "Sell Your IT Equipment At The Right Price | VDR Resale"
            }
          },
          {
           "@type": "ListItem",
          "position": 2,
          "item":
           {
             "@id": "https://www.vdrresale.com/service/sell-cisco-routers",
             "name": "Sell Used Cisco Routers | VDR Resale"
           }
          }
         ]
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "WebSite",
          "name": "VDR Resale",
          "url": "https://www.vdrresale.com/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://www.vdrresale.com/service/sell-cisco-routers{search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
        </script>
        <script type="application/ld+json">
        {
           "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue" : "5",
            "ratingCount" : "5",
            "reviewCount" : "12",
            "worstRating" : "1"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-used-cisco-phones'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Used Cisco Phones Services",
          "url": "https://www.vdrresale.com/service/sell-used-cisco-phones",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/6299dea5b135a.png",
          "description": "Sell Used Cisco Phones at VDR Resale at the proper market price. We will buy all your Cisco Phones. Get a Quote to Sell Used Cisco Phones.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
    
    @if (Request::is('service/sell-cisco-ip-phones'))
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Service", 
          "name": "Sell Cisco IP Phones services",
          "url": "https://www.vdrresale.com/service/sell-cisco-ip-phones",
          "areaServed": {
              "@type": "Place",
              "name": "Bishop's Stortford",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Stansted Distribution Centre, Start Hill",
                  "addressLocality": "Great Hallingbury",
                  "postalCode": "CM22 7DG",
                  "addressCountry": "United Kingdom" }
            },
          "image": "https://www.vdrresale.com/public/upload/service/6299ee4c6f7dd.png",
          "description": "Sell Cisco ip Phones at VDR Resale at the proper market price. We will buy all your Cisco ip Phones. Get a Quote to Sell Cisco Voip Phones.",
          "brand": {
            "@type": "Brand",
            "name": "VDR Resale",
            "slogan": ""
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "50",
            "worstRating": "50",
            "ratingCount": "5"
          }
        }
        </script>
    @endif
@stop

@section('content')
<div class="page-title parallax-style parallax1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1>{{ ucWords($services->service_name) }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="page-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="flat-wrapper">
                <div class="breadcrumbs">
                    <h2 class="trail-browse">You are here:</h2>
                    <ul class="trail-items">
                        <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="trail-item"><a href="{{url('services')}}">Services</a></li>
                        <li>{{ ucWords($services->service_name) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="flat-row flat-general sidebar-left pad-bottom65px">
    <div class="container">
        <div class="row">
            <div class="general">
                <div class="general-slider services-slider">
                    <div class="flexslider">
                        <ul class="slides">
                            @if($services->inner_image)
                            <li>
                                <a class="popup-gallery" href="{{url($services->inner_image)}}"><img src="{{url($services->inner_image)}}" alt="images"></a>
                            </li>
                            @endif
                            @if($services->inner_image1)
                            <li>
                                <a class="popup-gallery" href="{{url($services->inner_image1)}}"><img src="{{url($services->inner_image1)}}" alt="images"></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="flat-divider d10px"></div>
                <h3 class="flat-title-section style">{{$services->service_name}}</span></h3>
                <div>{!!$services->service_description!!}</div>
                <div class="flat-divider d50px"></div>
                <div class="flat-tabs">
                    <ul class="menu-tabs">
                        @if(isset($services->tab1title))
                            <li class="active"><a href="#">{{$services->tab1title}}</a></li>
                        @endif
                        @if(isset($services->tab2title))
                            <li class=""><a href="#">{{$services->tab2title}}</a></li>
                        @endif
                        @if(isset($services->tab1title))
                            <li class=""><a href="#">{{$services->tab3title}}</a></li>
                        @endif
                    </ul>
                    <div class="content-tab">
                         @if(isset($services->tab1_description))
                            <div class="content-inner active">
                                <p>{{$services->tab1_description}}</p>
                            </div>
                        @endif
                        @if(isset($services->tab2_description))
                            <div class="content-inner active">
                                <p>{{$services->tab2_description}}</p>
                            </div>
                        @endif @if(isset($services->tab3_description))
                            <div class="content-inner active">
                            <p>{{$services->tab3_description}}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flat-divider d10px"></div>
                @if(session()->has('message'))
                    <span class="form-success sucessMessage">{{ session()->get('message') }}</span>
                @endif
                @if (\Session::has('error'))
                    <span class="form-failure failMessage">{!! \Session::get('error') !!}</span>
                @endif
                <h4 class="widget-title">Inquire now about the service : {{ ucWords($services->service_name) }}</h4>
                <form id="contactform" method="POST" action="{{ route('serviceMail') }}">
                    @honeypot
                    {{ csrf_field() }}
                    <div class="row">
                        <input type="hidden" name="service_name" value="{{$services->service_name}}">
                        <div class="col-md-6">
                            <p>
                                <input name="name" type="text" value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <p>
                                <input name="email" type="email" value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <p>
                                <input name="phone" type="text" value="{{ old('phone') }}" placeholder="Phone Number">
                                @error('phone')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <textarea name="content_msg" placeholder="Comment">I would like to request a quote for the service -{{$services->service_name}}</textarea>
                                <!--{{ old('content_msg') }}-->
                                @error('content_msg')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="form-group col-md-12">
                            {!! htmlFormSnippet() !!}
                            @error('g-recaptcha-response')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <span class="form-submit">
                                <input name="submit" type="submit" id="{{ $services->service_slug }}" class="submit" value="Send Mail">
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="general-sidebars">
                <div class="sidebar-wrap">
                    <div class="sidebar">
                        <div class="widget widget_nav_menu">
                            <ul class="nav_menu">

                                <li class="menu-item">
                                    <a href="{{url('service/weee-recycling-services')}}">WEEE Recycling</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('service/data-centre-decommissioning')}}">Data Centre Decommissioning</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('service/sell-it-equipment')}}">Sell IT Equipment</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('service/sell-used-phone-system')}}"> Sell A Used Phone <div class="ipp_show"></div> System </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('service/sell-cisco-equipment')}}">Sell Cisco Equipment</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('quote')}}">Request a quote</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('services')}}">Explore all Services</a>
                                </li>

                            </ul>
                        </div>
                      <!--  @if(count($similer_service) > 0)
                        <div class="widget widget_nav_menu">
                            <ul class="nav_menu">
                                @foreach($similer_service as $i => $data)
                                <li class="menu-item">
                                    <a href="{{url('service/'.$data->service_slug)}}">{{ ucWords($data->service_name) }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif-->

                        <div class="widget widget_recent_entries">
                            <h4 class="widget-title">Latest news</h4>
                            <ul>
                                @foreach ($latest_blog as $blog)
                                <li>
                                    <a href="{{url('blog'.'/'.$blog->blog_slug)}}">{{$blog->blog_title}}</a>
                                    <span class="post-date">{{date('d-M-Y',strtotime($blog->created_at))}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div><!-- /.widget_recent_entries -->

                        <div class="widget widget_text">
                            <div class="textwidget">
                                <div class="content-text">
                                    <h4 class="title">Why choose us?</h4>
                                    <ul>
                                        <li><i class="fa fa-arrow-circle-right"></i>30 years experience <!--Over 20 years experience--></li>
                                        <li><i class="fa fa-arrow-circle-right"></i>Earth-friendly  <!--Well over 100 Trucks--></li>
                                        <li><i class="fa fa-arrow-circle-right"></i>Secure payments <!--Reliable Service--></li>
                                        <li><i class="fa fa-arrow-circle-right"></i>Professional team  <!--On Time Deliveries--></li>
                                        <li><i class="fa fa-arrow-circle-right"></i>Excellent customer service <!-- Professional Drivers--></li>
                                        <li><i class="fa fa-arrow-circle-right"></i>On-time collections <!--Excellent Customer Service--></li>
                                    </ul>
                                </div>
                            </div><!-- /.textwidget -->
                        </div><!-- /.widget_text -->

                    </div><!-- /.sidebar -->
                </div><!-- /.sidebar-wrap -->
            </div><!-- /.general-sidebars -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.blog -->
@endsection

@section('page-style')
    <style>
        .header-v3 .header .header-wrap{
            position: absolute;
        }
        .ipp_show{
          display: none;
        }
      	@media only screen and (max-width: 1124px) and (min-width: 1024px) {
            .ipp_show{
              display: block;
            }

        }
    </style>
@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        $('#contactform input').on("cut copy paste",function(e) {
            e.preventDefault();
        });
        $('#contactform textarea').on("cut copy paste",function(e) {
            e.preventDefault();
        });
    });
</script>
@endsection
