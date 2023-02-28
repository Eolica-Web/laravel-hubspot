<?php

namespace Eolica\LaravelHubspot\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \SevenShores\Hubspot\Resources\Analytics          analytics()
 * @method static \SevenShores\Hubspot\Resources\BlogAuthors        blogAuthors()
 * @method static \SevenShores\Hubspot\Resources\BlogComments       blogComments()
 * @method static \SevenShores\Hubspot\Resources\BlogPosts          blogPosts()
 * @method static \SevenShores\Hubspot\Resources\Blogs              blogs()
 * @method static \SevenShores\Hubspot\Resources\BlogTopics         blogTopics()
 * @method static \SevenShores\Hubspot\Resources\CalendarEvents     calendarEvents()
 * @method static \SevenShores\Hubspot\Resources\Companies          companies()
 * @method static \SevenShores\Hubspot\Resources\CompanyProperties  companyProperties()
 * @method static \SevenShores\Hubspot\Resources\ContactLists       contactLists()
 * @method static \SevenShores\Hubspot\Resources\ContactProperties  contactProperties()
 * @method static \SevenShores\Hubspot\Resources\Contacts           contacts()
 * @method static \SevenShores\Hubspot\Resources\CrmAssociations    crmAssociations()
 * @method static \SevenShores\Hubspot\Resources\CrmPipelines       crmPipelines()
 * @method static \SevenShores\Hubspot\Resources\DealPipelines      dealPipelines()
 * @method static \SevenShores\Hubspot\Resources\DealProperties     dealProperties()
 * @method static \SevenShores\Hubspot\Resources\Deals              deals()
 * @method static \SevenShores\Hubspot\Resources\EcommerceBridge    ecommerceBridge()
 * @method static \SevenShores\Hubspot\Resources\EmailEvents        emailEvents()
 * @method static \SevenShores\Hubspot\Resources\EmailSubscription  emailSubscription()
 * @method static \SevenShores\Hubspot\Resources\Engagements        engagements()
 * @method static \SevenShores\Hubspot\Resources\Events             events()
 * @method static \SevenShores\Hubspot\Resources\Files              files()
 * @method static \SevenShores\Hubspot\Resources\Forms              forms()
 * @method static \SevenShores\Hubspot\Resources\HubDB              hubDB()
 * @method static \SevenShores\Hubspot\Resources\Integration        integration()
 * @method static \SevenShores\Hubspot\Resources\Keywords           keywords()
 * @method static \SevenShores\Hubspot\Resources\LineItems          lineItems()
 * @method static \SevenShores\Hubspot\Resources\OAuth2             oAuth2()
 * @method static \SevenShores\Hubspot\Resources\ObjectProperties   objectProperties()
 * @method static \SevenShores\Hubspot\Resources\Owners             owners()
 * @method static \SevenShores\Hubspot\Resources\Pages              pages()
 * @method static \SevenShores\Hubspot\Resources\Products           products()
 * @method static \SevenShores\Hubspot\Resources\SocialMedia        socialMedia()
 * @method static \SevenShores\Hubspot\Resources\Tickets            tickets()
 * @method static \SevenShores\Hubspot\Resources\Timeline           timeline()
 * @method static \SevenShores\Hubspot\Resources\TransactionalEmail transactionalEmail()
 * @method static \SevenShores\Hubspot\Resources\Webhooks           webhooks()
 * @method static \SevenShores\Hubspot\Resources\Workflows          workflows()
 *
 * @see \Eolica\LaravelHubspot\HubspotManager
 */
final class Hubspot extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'hubspot';
    }
}
