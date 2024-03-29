<?php

namespace Eolica\LaravelHubspot;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use SevenShores\Hubspot\Factory;

/**
 * @method \SevenShores\Hubspot\Resources\Analytics          analytics()
 * @method \SevenShores\Hubspot\Resources\BlogAuthors        blogAuthors()
 * @method \SevenShores\Hubspot\Resources\BlogComments       blogComments()
 * @method \SevenShores\Hubspot\Resources\BlogPosts          blogPosts()
 * @method \SevenShores\Hubspot\Resources\Blogs              blogs()
 * @method \SevenShores\Hubspot\Resources\BlogTopics         blogTopics()
 * @method \SevenShores\Hubspot\Resources\CalendarEvents     calendarEvents()
 * @method \SevenShores\Hubspot\Resources\Companies          companies()
 * @method \SevenShores\Hubspot\Resources\CompanyProperties  companyProperties()
 * @method \SevenShores\Hubspot\Resources\ContactLists       contactLists()
 * @method \SevenShores\Hubspot\Resources\ContactProperties  contactProperties()
 * @method \SevenShores\Hubspot\Resources\Contacts           contacts()
 * @method \SevenShores\Hubspot\Resources\CrmAssociations    crmAssociations()
 * @method \SevenShores\Hubspot\Resources\CrmPipelines       crmPipelines()
 * @method \SevenShores\Hubspot\Resources\DealPipelines      dealPipelines()
 * @method \SevenShores\Hubspot\Resources\DealProperties     dealProperties()
 * @method \SevenShores\Hubspot\Resources\Deals              deals()
 * @method \SevenShores\Hubspot\Resources\EcommerceBridge    ecommerceBridge()
 * @method \SevenShores\Hubspot\Resources\EmailEvents        emailEvents()
 * @method \SevenShores\Hubspot\Resources\EmailSubscription  emailSubscription()
 * @method \SevenShores\Hubspot\Resources\Engagements        engagements()
 * @method \SevenShores\Hubspot\Resources\Events             events()
 * @method \SevenShores\Hubspot\Resources\Files              files()
 * @method \SevenShores\Hubspot\Resources\Forms              forms()
 * @method \SevenShores\Hubspot\Resources\HubDB              hubDB()
 * @method \SevenShores\Hubspot\Resources\Integration        integration()
 * @method \SevenShores\Hubspot\Resources\Keywords           keywords()
 * @method \SevenShores\Hubspot\Resources\LineItems          lineItems()
 * @method \SevenShores\Hubspot\Resources\OAuth2             oAuth2()
 * @method \SevenShores\Hubspot\Resources\ObjectProperties   objectProperties()
 * @method \SevenShores\Hubspot\Resources\Owners             owners()
 * @method \SevenShores\Hubspot\Resources\Pages              pages()
 * @method \SevenShores\Hubspot\Resources\Products           products()
 * @method \SevenShores\Hubspot\Resources\SocialMedia        socialMedia()
 * @method \SevenShores\Hubspot\Resources\Tickets            tickets()
 * @method \SevenShores\Hubspot\Resources\Timeline           timeline()
 * @method \SevenShores\Hubspot\Resources\TransactionalEmail transactionalEmail()
 * @method \SevenShores\Hubspot\Resources\Webhooks           webhooks()
 * @method \SevenShores\Hubspot\Resources\Workflows          workflows()
 */
final class HubspotManager extends AbstractManager
{
    public function __construct(Repository $config, private HubspotFactory $factory)
    {
        parent::__construct($config);
    }

    protected function createConnection(array $config): Factory
    {
        return $this->factory->__invoke($config);
    }

    protected function getConfigName(): string
    {
        return 'hubspot';
    }
}
