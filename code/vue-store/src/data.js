export const type = [
    'mens',
    'womens'
];

export const family = [
    'chrono',
    'classic',
    'voyager',
    'bloom',
    'boulevard'
];

export const strip = [
    'leather',
    'metal',
    'nylon'
];

export const products = [
    {
        id: 'gunmetal-sandstone',
        name: 'GUNMETAL SANDSTONE',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '525',
        thumbnail: 'GUNMETAL SANDSTONE.jpg',
        gallery: [
            'GUNMETAL SANDSTONE.jpg',
            'GUNMETAL SANDSTONE 2.jpg',
            'GUNMETAL SANDSTONE 3.jpg'
        ],
        type: 'mens',
        series: 'chrono',
        strip: 'leather',
        reviews: [
            {
                authorName: 'Joe Black',
                quote: 'Nunc augue enim, commodo et ullamcorper consequat, interdum a metus. Vivamus gravida arcu quis consectetur pharetra. Sed vitae justo finibus, interdum elit a, elementum leo.',
                rating: '4'
            },
            {
                authorName: 'Steve Smith',
                quote: 'Donec nunc nulla, ullamcorper eu lacus at, placerat cursus urna. Sed ac sem sed ligula fringilla imperdiet a quis tortor.',
                rating: '5'
            }
        ]
    },
    {
        id: 'gunmetal',
        name: 'GUNMETAL',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '585',
        thumbnail: 'GUNMETAL.jpg',
        gallery: [],
        type: 'mens',
        series: 'chrono',
        strip: 'metal',
        reviews: [
            {
                authorName: 'Steve Smith',
                quote: 'Donec nunc nulla, ullamcorper eu lacus at, placerat cursus urna. Sed ac sem sed ligula fringilla imperdiet a quis tortor.',
                rating: '5'
            }
        ]
    },
    {
        id: 'black-leather',
        name: 'BLACK LEATHER',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '370',
        thumbnail: 'BLACK LEATHER.jpg',
        gallery: [],
        type: 'mens',
        series: 'classic',
        strip: 'leather',
        reviews: [
            {
                authorName: 'Tiffanie Acome',
                quote: 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut et semper massa.',
                rating: '5'
            },
            {
                authorName: 'Christalle Hambling',
                quote: 'Fusce volutpat nisl fermentum, varius nisi sed, facilisis magna.',
                rating: '4'
            }
        ]
    },
    {
        id: 'white-silver',
        name: 'WHITE SILVER',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '390',
        thumbnail: 'WHITE SILVER.jpg',
        gallery: [],
        type: 'mens',
        series: 'classic',
        strip: 'metal',
        reviews: [
            {
                authorName: 'Steve Smith',
                quote: 'Donec nunc nulla, ullamcorper eu lacus at, placerat cursus urna. Sed ac sem sed ligula fringilla imperdiet a quis tortor.',
                rating: '5'
            },
        ]
    },
    {
        id: 'desert',
        name: 'DESERT',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '545',
        thumbnail: 'DESERT.jpg',
        gallery: [],
        type: 'mens',
        series: 'voyager',
        strip: 'nylon',
        reviews: [
            {
                authorName: 'Tiffanie Acome',
                quote: 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut et semper massa.',
                rating: '5'
            },
            {
                authorName: 'Christalle Hambling',
                quote: 'Fusce volutpat nisl fermentum, varius nisi sed, facilisis magna.',
                rating: '4'
            }
        ]
    },
    {
        id: 'cascade',
        name: 'CASCADE',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '585',
        thumbnail: 'CASCADE.jpg',
        gallery: [],
        type: 'mens',
        series: 'voyager',
        strip: 'metal',
        reviews: [
            {
                authorName: 'Ryun Dreelan',
                quote: 'Etiam id aliquet augue. Duis euismod, ex ut fringilla consectetur, tortor magna tempus libero, eget suscipit sem nunc non tellus.',
                rating: '3'
            }
        ]
    },
    {
        id: 'voyager-monochrome',
        name: 'VOYAGER MONOCHROME',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '565',
        thumbnail: 'VOYAGER MONOCHROME.jpg',
        gallery: [],
        type: 'mens',
        series: 'voyager',
        strip: 'nylon',
        reviews: [
            {
                authorName: 'Ryun Dreelan',
                quote: 'Etiam id aliquet augue. Duis euismod, ex ut fringilla consectetur, tortor magna tempus libero, eget suscipit sem nunc non tellus.',
                rating: '3'
            },
            {
                authorName: 'Freddy Fishley',
                quote: 'Morbi ac purus tempor ipsum placerat sodales. Aenean orci nulla, dignissim nec commodo sit amet, faucibus faucibus magna.',
                rating: '5'
            }
        ]
    },
    {
        id: 'ghost-iris',
        name: 'GHOST IRIS',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '545',
        thumbnail: 'GHOST IRIS.jpg',
        gallery: [],
        type: 'womens',
        series: 'bloom',
        strip: 'leather',
        reviews: [
            {
                authorName: 'Tiffanie Acome',
                quote: 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut et semper massa.',
                rating: '5'
            }
        ]
    },
    {
        id: 'blush-dhalia',
        name: 'BLUSH DHALIA',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '605',
        thumbnail: 'BLUSH DHALIA.jpg',
        gallery: [],
        type: 'womens',
        series: 'bloom',
        strip: 'metal',
        reviews: [
            {
                authorName: 'Ryun Dreelan',
                quote: 'Etiam id aliquet augue. Duis euismod, ex ut fringilla consectetur, tortor magna tempus libero, eget suscipit sem nunc non tellus.',
                rating: '3'
            },
            {
                authorName: 'Freddy Fishley',
                quote: 'Morbi ac purus tempor ipsum placerat sodales. Aenean orci nulla, dignissim nec commodo sit amet, faucibus faucibus magna.',
                rating: '5'
            },
            {
                authorName: 'Leda Cuffley',
                quote: 'Morbi gravida feugiat ipsum ac facilisis. Praesent accumsan turpis vitae nibh ullamcorper malesuada. ',
                rating: '1'
            }
        ]
    },
    {
        id: 'mckinley',
        name: 'MCKINLEY',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '445',
        thumbnail: 'MCKINLEY.jpg',
        gallery: [],
        type: 'womens',
        series: 'boulevard',
        strip: 'nylon',
        reviews: [
            {
                authorName: 'Steve Smith',
                quote: 'Donec nunc nulla, ullamcorper eu lacus at, placerat cursus urna. Sed ac sem sed ligula fringilla imperdiet a quis tortor.',
                rating: '5'
            },
        ]
    },
    {
        id: 'rodeo',
        name: 'RODEO',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '395',
        thumbnail: 'RODEO.jpg',
        gallery: [],
        type: 'womens',
        series: 'boulevard',
        strip: 'leather',
        reviews: [
            {
                authorName: 'Joe Black',
                quote: 'Nunc augue enim, commodo et ullamcorper consequat, interdum a metus. Vivamus gravida arcu quis consectetur pharetra. Sed vitae justo finibus, interdum elit a, elementum leo.',
                rating: '4'
            },
            {
                authorName: 'Steve Smith',
                quote: 'Donec nunc nulla, ullamcorper eu lacus at, placerat cursus urna. Sed ac sem sed ligula fringilla imperdiet a quis tortor.',
                rating: '5'
            },
            {
                authorName: 'Tiffanie Acome',
                quote: 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut et semper massa.',
                rating: '5'
            }
        ]
    },
    {
        id: 'lincoln',
        name: 'LINCOLN',
        description: 'Pellentesque mauris arcu, pulvinar eget felis eget, malesuada vehicula magna. Mauris aliquam vehicula imperdiet. Curabitur blandit sapien non nisi condimentum, sed molestie augue tempor. ',
        price: '485',
        thumbnail: 'LINCOLN.jpg',
        gallery: [],
        type: 'womens',
        series: 'boulevard',
        strip: 'metal',
        reviews: [
            {
                authorName: 'Steve Smith',
                quote: 'Donec nunc nulla, ullamcorper eu lacus at, placerat cursus urna. Sed ac sem sed ligula fringilla imperdiet a quis tortor.',
                rating: '5'
            }
        ]
    },
];

export const reviews = [
    {
        authorName: 'Joe Black',
        quote: 'Nunc augue enim, commodo et ullamcorper consequat, interdum a metus. Vivamus gravida arcu quis consectetur pharetra. Sed vitae justo finibus, interdum elit a, elementum leo.',
        rating: '4'
    },
    {
        authorName: 'Steve Smith',
        quote: 'Donec nunc nulla, ullamcorper eu lacus at, placerat cursus urna. Sed ac sem sed ligula fringilla imperdiet a quis tortor.',
        rating: '5'
    },
    {
        authorName: 'Tiffanie Acome',
        quote: 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut et semper massa.',
        rating: '5'
    },
    {
        authorName: 'Christalle Hambling',
        quote: 'Fusce volutpat nisl fermentum, varius nisi sed, facilisis magna.',
        rating: '4'
    },
    {
        authorName: 'Ryun Dreelan',
        quote: 'Etiam id aliquet augue. Duis euismod, ex ut fringilla consectetur, tortor magna tempus libero, eget suscipit sem nunc non tellus.',
        rating: '3'
    },
    {
        authorName: 'Freddy Fishley',
        quote: 'Morbi ac purus tempor ipsum placerat sodales. Aenean orci nulla, dignissim nec commodo sit amet, faucibus faucibus magna.',
        rating: '5'
    },
    {
        authorName: 'Leda Cuffley',
        quote: 'Morbi gravida feugiat ipsum ac facilisis. Praesent accumsan turpis vitae nibh ullamcorper malesuada. ',
        rating: '1'
    }
];