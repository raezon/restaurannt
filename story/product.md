##### idea about making a new entity called product
this entity will be like follow

Product {
    id
    name
    description
    photo
    type
    language
}

all tables will belongs to a product like :
food,plat,packs all will belongs to one product
this will facilitate the order later and will emphasise the use of factory pattern.

also this will make the manipulation of ingrediants preety easy.

we will need to :
-create migation for product
-overide previous commits food,plat,pack adding a respective productId on each one of them.