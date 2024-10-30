<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TermPrivacyItem;

class TermPrivacyItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new TermPrivacyItem;
        $obj->term = 'Term Data Here';
        $obj->privacy = 'Privacy Policy for ExploreRight Travel Agency

Effective Date: October 1, 2024
Welcome to ExploreRight Travel Agency, accessible from www.exploreright.com. Your privacy is critically important to us, and we are committed to protecting the personal information you share with us while using our platform to book your dream tours.

1. Information We Collect

a. Personal Identification Information:

Name and Contact Data: We collect your first and last name, email address, postal address, phone number, and other similar contact data when you register or book a tour.
Payment Information: To process payments for bookings, we collect payment information which may include your credit card details and billing address.
b. Technical Information:

Log Data: We automatically collect certain information when you visit our website, including your IP address, browser type, operating system, and the pages you viewed.
Cookies: We use cookies to enhance your browsing experience, allowing us to remember you and your preferences during your return visits.
2. How We Use Your Information

We use the information we collect for various purposes:

To Provide Services: To manage your bookings and provide you with the tours you have requested.
To Improve Our Services: To understand how our users interact with our services and improve their functionality.
For Marketing Purposes: To send you promotional materials that may be of interest if you have opted in to receive such communications.
3. Sharing Your Information

We may share your information with third parties in the following situations:

Service Providers: We may share your data with third parties who perform services on our behalf, such as payment processing, data analysis, email delivery, hosting services, and customer service.
Legal Obligations: We may disclose your information if required to do so by law or in response to valid requests by public authorities (e.g., a court or a government agency).';
        $obj->save();
    }
}
