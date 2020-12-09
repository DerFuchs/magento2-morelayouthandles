<br />
<p align="center">
  <h3 align="center">Magento 2 - More Layout Handles</h3>

  <p align="center">
    Get some more useful layout handles for Magento 2
    <br />
    <a href="https://github.com/DerFuchs/MoreLayoutHandles"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/DerFuchs/MoreLayoutHandles/issues">Report Bug</a>
    ·
    <a href="https://github.com/DerFuchs/MoreLayoutHandles/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-for">Built For</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#available-layout-updates">Available Layout Updates</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

This Module dynamically adds some more layout handles to specific Magento 2 pages.

This becomes very useful when you want to make changes to the layout, for example remove some blocks or move them to another location.


### Built For

* Magento 2, tested on Version 2.4.x



<!-- GETTING STARTED -->
## Getting Started

This module is available as a composer module for Magento 2

### Installation

1. Install to your Magento 2 by using composer
   ```sh
   composer require derfuchs/magento2-morelayouthandles
   ```
1. Upgrade Magento 2
   ```sh
   bin/magento setup:upgrade
   ```
1. Re-compile Magento's dependency injections
   ```sh
   bin/magento setup:di:compile
   ```


<!-- USAGE EXAMPLES -->
## Usage

Enable every possible new layout handle in Magento's admin panel. Then set your layout updates in a layout xml file:

1. Enable the layout handle you want to use: `Magento Admin -> Stores -> Configuration -> General -> More Layout Handles`
2. Check if the new layout handle appears by using a developer toolbar or enabling the debug output of this module: `Magento Admin -> Stores -> Configuration -> General -> More Layout Handles -> General Settings -> Debug`
3. Create a new file named by the resulting layout handle `<magento_root>/app/design/frontend/<vendor_name>/<theme_name>/Magento_Theme/layout/<layout_handle_name>.xml` (You don't have to use the Magento_Theme folder, it's just an example)
4. Start writing your layout update XML. Feel free to use this template as a starting point:
```xml
<?xml version="1.0"?>
<!--
/**
 * Some useful hints about what this layout update file does
 */
-->
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <body>
        <!-- reference a container or a block or whatever. See Magento's layout instruction documentation for more information: https://devdocs.magento.com/guides/v2.4/frontend-dev-guide/layouts/xml-instructions.html -->
        <referenceContainer name="container.name.you.want.to.reference">
            <!-- do stuff -->
        </referenceContainer>
    </body>
</page>
```
5. Clean Caches: `bin/magento cache:clean`

That's it. When the layout handle occurs, Magento will bake in yout layout updates.

## Available Layout Updates

### Add product's attribute set ID to product pages
occurs on: product detail pages
layout handle's name: catalog_product_view_attribute_set_id_(attribute-set-id)

### Add product's attribute set name to product pages
occurs on: product detail pages
layout handle's name: catalog_product_view_attribute_set_name_(attribute-set-name)

### Didn't find what you need?
Feed free to [ask for implementation](https://github.com/DerFuchs/MoreLayoutHandles/issues) or do it by yourself (and make a pull request to let others participate :) ).


<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/DerFuchs/MoreLayoutHandles/issues) for a list of proposed features (and known issues).

### Upcoming Version 1.1
Add layout handles on the occurance of specific product attributes

### Recent Version 1.0
Layout handles for product's attribute set ID and attribute set name on product pages



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Michael Fuchs - derfuchs - michael@derfuchs.net

Project Link: [https://github.com/DerFuchs/MoreLayoutHandles](https://github.com/DerFuchs/MoreLayoutHandles)

<!-- PROJECT SHIELDS -->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/DerFuchs/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/DerFuchs/repo/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/DerFuchs/repo.svg?style=for-the-badge
[forks-url]: https://github.com/DerFuchs/repo/network/members
[stars-shield]: https://img.shields.io/github/stars/DerFuchs/repo.svg?style=for-the-badge
[stars-url]: https://github.com/DerFuchs/repo/stargazers
[issues-shield]: https://img.shields.io/github/issues/DerFuchs/repo.svg?style=for-the-badge
[issues-url]: https://github.com/DerFuchs/repo/issues
[license-shield]: https://img.shields.io/github/license/DerFuchs/repo.svg?style=for-the-badge
[license-url]: https://github.com/DerFuchs/repo/blob/master/LICENSE
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/michael-fuchs-7b669546/
