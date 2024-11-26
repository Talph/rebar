@if(\Request::route()->getName() == 'welcome')

    <meta name="description" content="AfrFinity is a company located in Randburg, South Africa. We help organizations grow their business and increase their market share. We go beyond boundaries of the Digital Agency skill divide.">
    <meta name="keywords" content="Digital Agency, Website Development, Website Design, Animation Design, Software Development">
    <meta itemprop="name" content="AfrFinity Pty Ltd">
    <meta itemprop="url" content="https://www.afrFinity.com/">

@elseif(\Request::route()->getName() == 'about')

    <meta name="description" content="Rebar Africa is a construction company that delivers high quality, reliable construction services for governmental establishments. In addition, we have broad expertise with commercial clients. We are a fully licensed specialist in all facets of building maintenance and refurbishment, programmed maintenance works and other specialised works">
    <meta name="keywords" content="rebar i-afrika, rebar, rebar Director, Simthembile Bantubani, About rebar, rebar Midrand, rebar Johannesburg, rebar South Africa">
    <meta name="generator" content="https://m-ifrika.co.za/m/about-us/overview">
    <meta itemprop="url" content="https://m-ifrika.co.za/m/about-us/overview">

@elseif(\Request::route()->getName() == 'services')

    <meta name="description" content="Our Structures experience spans from the construction of bridges, reservoirs, chambers, water purification and wastewater treatment works, having constructed a number of major structures across the country.">
    <meta name="keywords" content="Structures,Building , Storm Water, Road Construction, Bulk Water Reticulation, Property Development, Mechanical Work">
    <meta name="generator" content="https://m-ifrika.co.za/m/services">
    <meta itemprop="name" content="Services offered by rebar">
    <meta itemprop="url" content="https://m-ifrika.co.za/m/services">
    <meta property="og:url" content="https://rebar.co.za/m/services">

@elseif(\Request::route()->getName() == 'projects')

    <meta name="description" content="rebar i-Afrika strive to act as an interface to engage the public in our vision for a liveable, sustainable and affordable future for our cities and neighbourhoods.">
    <meta name="keywords" content="Bond Street Stormwater Upgrade,Drieziek Public Transport Facility , Protea Glen, Ibika-Centane Bulk Water Supply and reticulation, South Road Bridge Construction">
    <meta name="generator" content="rebar.co.za/">
    <meta name="author" content="Tafara Shamu">
    <meta itemprop="name" content="Projects - Rebar Africa">
    <meta itemprop="url" content="https://rebar.co.za/m/projects">
    <meta property="og:url" content="https://rebar.co.za/m/projects">

@elseif(\Request::route()->getName() == 'blog.index')

    <meta name="description" content="Our Structures experience spans from the construction of bridges, reservoirs, chambers, water purification and wastewater treatment works, having constructed a number of major structures across the country.">
    <meta name="keywords" content="Contact rebar i-afrika, rebar , rebar i-afrika, rebar offices, rebar contacts, rebar direction, rebar location, rebar Headquaters">
    <meta name="generator" content="https://m-ifrika.co.za/m/blogs">
    <meta itemprop="url" content="https://m-ifrika.co.za/m/blogs">

@elseif(\Request::route()->getName() == 'contact.us')

    <meta name="description" content="Our Structures experience spans from the construction of bridges, reservoirs, chambers, water purification and wastewater treatment works, having constructed a number of major structures across the country.">
    <meta name="keywords" content="Contact rebar i-afrika, rebar , rebar i-afrika, rebar offices, rebar contacts, rebar direction, rebar location, rebar Headquaters">
    <meta name="generator" content="https://m-ifrika.co.za/m/contact-us">
    <meta itemprop="url" content="https://m-ifrika.co.za/m/contact-us">


@elseif(\Request::route()->getName() == 'gallery')

    <meta name="description" content="Our Structures experience spans from the construction of bridges, reservoirs, chambers, water purification and wastewater treatment works, having constructed a number of major structures across the country.">
    <meta name="keywords" content="projects rebar i-afrika, rebar projects, rebar i-afrika tenders, rebar tenders">

@endif
