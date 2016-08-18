<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(array(
            'name' => 'home',
            'title' => 'Yuru Retreat Delo',
            'description' => 
            'Yuru is located about 7km from Kalimpong town on Delo Hill. It is just across the famous Delo Park. The property is spread over 8 acres of the ridge and commands a panoramic view of Kanchanjunga and its sister peaks, the Sikkim hills and the River Teesta. Yuru has seven super deluxe double bedded rooms and one super deluxe quadruple family room. All rooms command an unobstructed view of the mountains.'
        ));

        Page::create(array(
            'name' => 'rooms',
            'title' => 'Rooms',
            'description' => 
            'The spacious rooms have large windows that open out to a scenic vista of the river, hills and mountains. They are thoughtfully laid out with white wood furniture, teak parquet floor, quality mattresses and linen. The rooms are fitted with intercom, have wifi accessibility, flat screen TV, tea and coffee maker, alarm clocks etc. The bathrooms are clean and spacious with modern fittings and 24 hours running hot and cold water. Small details are taken care. For example some bathrooms have shower cubicles and curtains. Rooms have double windows with nets so that guests can enjoy the cool breeze while keeping the insects out. The lightning is also warm and subdued yet adequate.'
        ));

        Page::create(array(
            'name' => 'restaurant',
            'title' => 'Restaurant',
            'description' => 
            'Yuru has a spacious restaurant on the top. Its large windows provide an awe-inspiring view of the river valley, the hills and the mountains. The in-house chef is an industry veteran satisfying the most demanding gourmets with his Indian, Chinese, Tibetan, Continental and Nepali preparations. The restaurant is spotlessly clean and has tasteful teak and cane furniture. There is a seating and dining area on the terrace also.'
        ));

        Page::create(array(
            'name' => 'property',
            'title' => 'Property',
            'description' => 
            'Yuru is almost 8 acres on the ridge. One can drive right into the property. Yuru has a car park that can easily accommodate about 15 vehicles. There are gardens with interesting plant species- tea, ginko biloba, rhododendrons, azaeleas, maple, tree ferns, varieties of bamboo, wild raspberries etc. There is a sit-out area of hewed stone that provides a majestic view of the river, hills and mountains. Within the property there are walking trails, lookout points and other interesting features. There is also a large outdoor generator to provide electricity during power outages.'
        ));

        Page::create(array(
            'name' => 'service',
            'title' => 'Service',
            'description' => 
            'Yuru blends the informal and intimate setting of a homestay with the professional service and facilities of a modern hotel. It is sufficiently staffed by a retinue of polite, earnest, sincere and hardworking folks eager and willing to provide individualized, bespoke attention and service to guests of all ages and dispositions. The management is knowledgeable and easily accessible.'
        ));

        Page::create(array(
            'name' => 'itinerary',
            'title' => 'Itinerary',
            'description' => 
            'Compared to Darjeeling and Sikkim, Kalimpong is less well known. However it is a quaint cosmopolitan hill town with an all round temperate weather. It is famous for its schools, flower nurseries and a green and leafy suburban landscape that provides for relaxed living amidst the bounties of nature. The town itself may seem unruly and chaotic but its shops provide all provisions for day to day living that will not make one miss the city.
Ideally Kalimpong should be more than the one night stop that it has become for visitors either beginning their trip into the region or ending their sojourn. The common refrain amongst Yuru guests is that they should have planned for staying a few more nights. Repeat guests therefore always increase the length of their stay after having once succumbed to the charms of the Yuru ambiance and service.
Some farsighted guests have made Yuru their base from where they have explored Darjeeling and the adjoining areas. When one realizes that Kalimpong’s location allows for travel to Darjeeling, Siliguri, Gangtok, Namchu all within 3 hours, that kind of planning makes sense.'
        ));

        Page::create(array(
            'name' => 'whattodo',
            'title' => 'What To Do At Yuru',
            'description' => 
            'Well ‘do nothing’ would be a cheeky way of putting it. But this is what many guests do. They just soak in the ambiance. They laze around in the room feasting on the scenic vista that their windows open out to. And when hungry they feast on the delicacies conjured by the in-house chef. Or they take a walk within the property and select some vantage point from where they contemplate the scenic panorama spread before them like an infinite painting.
Guests who want to do more can be picked up from the property itself for paragliding flights. They could just take a walk and visit the Delo Park, Science Centre, the Forest Garden etc. They could go for a picnic to the river and enjoy white water rafting. Or visit places such as Lava, Loleygaon, Rambhang, Rishop etc.
Yuru will help them plan these trips and guests can communicate with the management prior to their visit so that these things can be planned with the other partners and stakeholders.'
        ));
    }
}
