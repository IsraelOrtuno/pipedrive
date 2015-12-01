## Roadmap

### Activities
State: 6/6
- [x] `GET`       Get all activities assigned to a particular user `/activities`
- [x] `GET`       Get details of an activity `/activities/:id`
- [x] `POST`      Add an activity `/activities`
- [x] `PUT`       Edit an activity `/activities/:id`
- [x] `DELETE`    Delete an activity `/activities/:id`
- [x] `DELETE`    Delete multiple activities in bulk `/activities`

### ActivityTypes
State: 5/5
- [x] `GET`       Get all activity types `/activityTypes`
- [x] `POST`      Add new activity type `/activityTypes`
- [x] `PUT`       Edit activity type `/activityTypes/:id`
- [x] `DELETE`    Delete an activity type `/activityTypes/:id`
- [x] `DELETE`    Delete multiple activity types in bulk `/activityTypes`

### Authorizations
State: 1/1
- [x] `POST`      Get all authorizations for a user `/authorizations`

### Currencies
State: 1/1
- [x] `GET`       Get all supported currencies `/currencies`

### Deals
State: 18/26
- [x] `GET`       Get all deals `/deals`
- [x] `GET`       Get details of a deal `/deals/:id`
- [x] `POST`      Add a deal `/deals`
- [x] `PUT`       Update a deal `/deals/:id`
- [x] `DELETE`    Delete a deal `/deals/:id`
- [x] `DELETE`    Delete multiple deals in bulk `/deals`
- [x] `POST`      Duplicate deal `/deals/:id/duplicate`
- [x] `PUT`       Merge two deals `/deals/:id/merge`
- [x] `POST`      Add a follower to a deal `/deals/:id/followers`
- [x] `GET`       List followers of a deal `/deals/:id/followers`
- [x] `DELETE`    Delete a follower from a deal `/deals/:id/followers/:follower_id`
- [x] `GET`       List products attached to a deal `/deals/:id/products`
- [ ] `POST`      Add a product to the deal, eventually creating a new item called a deal-product. `/deals/:id/products`
- [ ] `PUT`       Update product attachment details of the deal-product (a product already attached to a deal) `/deals/:id/products/:deal_product_id`
- [ ] `DELETE`    Delete an attached product from a deal `/deals/:id/products`
- [x] `GET`       List activities associated with a deal `/deals/:id/activities`
- [x] `GET`       List updates about a deal `/deals/:id/updates`
- [ ] `POST`      Add a participant to a deal `/deals/:id/participants`
- [ ] `GET`       List participants of a deal `/deals/:id/participants`
- [ ] `DELETE`    Delete a participant from a deal `/deals/:id/participants/:deal_participant_id`
- [x] `GET`       List files attached to a deal `/deals/:id/files`
- [x] `GET`       List permitted users `/deals/:id/permittedUsers`
- [x] `GET`       List e-mail messages associated with a deal `/deals/:id/emailMessages`
- [x] `GET`       Find deals by name `/deals/find`
- [ ] `GET`       Get deals timeline `/deals/timeline`

### DealFields
State: 6/6
- [x] `GET`       Get all deal fields `/dealFields`
- [x] `GET`       Get one deal field `/dealFields/:id`
- [x] `POST`      Add a new deal field `/dealFields`
- [x] `PUT`       Update a deal field `/dealFields/:id`
- [x] `DELETE`    Delete a deal field `/dealFields/:id`
- [x] `DELETE`    Delete multiple deal fields in bulk `/dealFields`

### EmailMessages
State: 4/4
- [x] `GET`       Get one e-mail message `/emailMessages/:id`
- [x] `PUT`       Update e-mail message details `/emailMessages/:id`
- [x] `DELETE`    Delete an e-mail message `/emailMessages/:id`
- [x] `DELETE`    Delete multiple e-mail messages in bulk `/emailMessages`

### EmailThreads
State: 6/6
- [x] `GET`       Get all e-mail message threads `/emailThreads`
- [x] `GET`       Get one e-mail message thread `/emailThreads/:id`
- [x] `PUT`       Update e-mail message thread details `/emailThreads/:id`
- [x] `DELETE`    Delete an e-mail message thread `/emailThreads/:id`
- [x] `DELETE`    Delete multiple e-mail message threads in bulk `/emailThreads`
- [x] `GET`       List e-mail messages inside a thread `/emailThreads/:id/messages`

### Files
State: 7/8
- [x] `GET`       Get all files `/files`
- [x] `GET`       Get one file `/files/:id`
- [ ] `GET`       Download one file `/files/:id/download`
- [x] `POST`      Add file(s) `/files`
- [x] `POST`      Create a remote file and link it to an item `/files/remote`
- [x] `POST`      Link a remote file to an item `/files/remoteLink`
- [x] `PUT`       Update file details `/files/:id`
- [x] `DELETE`    Delete a file `/files/:id`

### Filters
State: 5/6
- [x] `GET`       Get all filters `/filters`
- [x] `GET`       Get one filter `/filters/:id`
- [x] `POST`      Add a new filter `/filters`
- [x] `PUT`       Update filter `/filters/:id`
- [x] `DELETE`    Delete a filter `/filters/:id`
- [x] `DELETE`    Delete multiple filters in bulk `/filters`

### GlobalMessages
State: 2/2
- [x] `GET`       Get global messages `/globalMessages`
- [x] `DELETE`    Dismiss a global message `/globalMessages/:id`

### Goals
State: 5/6
- [x] `GET`       Get all goals `/goals`
- [x] `GET`       Get details of a goal `/goals/:id`
- [x] `POST`      Add a new goal `/goals`
- [x] `PUT`       Update goal details `/goals/:id`
- [x] `DELETE`    Delete existing goal `/goals/:id`
- [ ] `GET`       Get results of one goal `/goals/:id/results`

### Notes
State: 5/5
- [x] `GET`       Get all notes `/notes`
- [x] `GET`       Get one note `/notes/:id`
- [x] `POST`      Add a note `/notes`
- [x] `PUT`       Update a note `/notes/:id`
- [x] `DELETE`    Delete a note `/notes/:id`

### OrganizationFields
State: 6/6
- [x] `GET`       Get all organization fields `/organizationFields`
- [x] `GET`       Get one organization field `/organizationFields/:id`
- [x] `POST`      Add a new organization field `/organizationFields`
- [x] `PUT`       Update an organization field `/organizationFields/:id`
- [x] `DELETE`    Delete an organization field `/organizationFields/:id`
- [x] `DELETE`    Delete multiple organization fields in bulk `/organizationFields`

### Organizations
State: 18/18
- [x] `GET`       Get all organizations `/organizations`
- [x] `GET`       Get details of an organization `/organizations/:id`
- [x] `POST`      Add an organization `/organizations`
- [x] `PUT`       Update an organization `/organizations/:id`
- [x] `DELETE`    Delete an organization `/organizations/:id`
- [x] `DELETE`    Delete multiple organizations in bulk `/organizations`
- [x] `GET`       List files attached to an organization `/organizations/:id/files`
- [x] `GET`       List e-mail messages associated with an organization `/organizations/:id/emailMessages`
- [x] `POST`      Add a follower to an organization `/organizations/:id/followers`
- [x] `GET`       List followers of an organization `/organizations/:id/followers`
- [x] `DELETE`    Delete a follower from an organization `/organizations/:id/followers/:follower_id`
- [x] `GET`       List persons of an organization `/organizations/:id/persons`
- [x] `GET`       List deals associated with an organization `/organizations/:id/deals`
- [x] `GET`       List activities associated with an organization `/organizations/:id/activities`
- [x] `GET`       List updates about an organization `/organizations/:id/updates`
- [x] `GET`       List permitted users `/organizations/:id/permittedUsers`
- [x] `PUT`       Merge two organizations `/organizations/:id/merge`
- [x] `GET`       Find organizations by name `/organizations/find`

### Organization Relationships
State: 5/5
- [x] `GET`       Get all relationships for organization `/organizationRelationships`
- [x] `GET`       Get one organization relationship `/organizationRelationships/:id`
- [x] `POST`      Create an organization relationship `/organizationRelationships`
- [x] `PUT`       Update an organization relationship `/organizationRelationships/:id`
- [x] `DELETE`    Delete an organization relationship `/organizationRelationships/:id`

### PermissionSets
State: 3/6
- [x] `GET`       Get all permission sets `/permissionSets`
- [x] `GET`       Get one permission set `/permissionSets/:id`
- [x] `PUT`       Update permission set details `/permissionSets/:id`
- [ ] `GET`       List permission set assignments `/permissionSets/:id/assignments`
- [ ] `POST`      Add permission set assignment `/permissionSets/:id/assignments`
- [ ] `DELETE`    Delete a permission set assignment `/permissionSets/:id/assignments`

### Persons
State: 18/20
- [x] `GET`       Get all persons `/persons`
- [x] `GET`       Get details of a person `/persons/:id`
- [x] `POST`      Add a person `/persons`
- [x] `PUT`       Update a person `/persons/:id`
- [x] `DELETE`    Delete a person `/persons/:id`
- [x] `DELETE`    Delete multiple persons in bulk `/persons`
- [x] `GET`       List files attached to a person `/persons/:id/files`
- [x] `GET`       List e-mail messages associated with a person `/persons/:id/emailMessages`
- [x] `POST`      Add a follower to a person `/persons/:id/followers`
- [x] `GET`       List followers of a person `/persons/:id/followers`
- [x] `DELETE`    Delete a follower from a person `/persons/:id/followers/:follower_id`
- [x] `GET`       List products associated with a person `/persons/:id/products`
- [x] `GET`       List deals associated with a person `/persons/:id/deals`
- [x] `GET`       List updates about a person `/persons/:id/updates`
- [x] `GET`       List activities associated with a person `/persons/:id/activities`
- [x] `GET`       List permitted users `/persons/:id/permittedUsers`
- [x] `PUT`       Merge two persons `/persons/:id/merge`
- [x] `GET`       Find persons by name `/persons/find`
- [ ] `POST`      Add person picture `/persons/:id/picture`
- [ ] `POST`      Delete person picture `/persons/:id/picture`

### PersonFields
State: 6/6
- [x] `GET`       Get all person fields `/personFields`
- [x] `GET`       Get one person field `/personFields/:id`
- [x] `POST`      Add a new person field `/personFields`
- [x] `PUT`       Update a person field `/personFields/:id`
- [x] `DELETE`    Delete a person field `/personFields/:id`
- [x] `DELETE`    Delete multiple person fields in bulk `/personFields`

### Pipelines
State: 5/8
- [x] `GET`       Get all pipelines `/pipelines`
- [x] `GET`       Get one pipeline `/pipelines/:id`
- [x] `POST`      Add a new pipeline `/pipelines`
- [x] `PUT`       Edit a pipeline `/pipelines/:id`
- [ ] `GET`       Get deals in a pipeline `/pipelines/:id/deals`
- [x] `DELETE`    Delete a pipeline `/pipelines/:id`
- [ ] `GET`       Get deals conversion rates in pipeline `/pipelines/:id/conversion_statistics`
- [ ] `GET`       Get deals movements in pipeline `/pipelines/:id/movement_statistics`

### Products
State: 9/9
- [x] `GET`       Get all products `/products`
- [x] `GET`       Get one product `/products/:id`
- [x] `GET`       Get deals where a product is attached to `/products/:id/deals`
- [x] `POST`      Add a product `/products`
- [x] `PUT`       Update a product `/products/:id`
- [x] `DELETE`    Delete a product `/products/:id`
- [x] `GET`       List files attached to a product `/products/:id/files`
- [x] `GET`       List permitted users `/products/:id/permittedUsers`
- [x] `GET`       Find products by name `/products/find`

### ProductFields
State: 6/6
- [x] `GET`       Get all product fields `/productFields`
- [x] `GET`       Get one product field `/productFields/:id`
- [x] `POST`      Add a new product field `/productFields`
- [x] `PUT`       Update a product field `/productFields/:id`
- [x] `DELETE`    Delete a product field `/productFields/:id`
- [x] `DELETE`    Delete multiple product fields in bulk `/productFields`

### PushNotifications
State: 4/4
- [x] `GET`       Get all subscriptions `/pushNotifications`
- [x] `GET`       Get details of a subscription `/pushNotifications/:id`
- [x] `POST`      Create new subscription `/pushNotifications`
- [x] `DELETE`    Delete existing subscription `/pushNotifications/:id`

### Recents
State: 1/1
- [x] `GET`       Get recents `/recents`

### Roles
State: 5/11
- [x] `GET`       Get all roles `/roles`
- [x] `GET`       Get one role `/roles/:id`
- [x] `POST`      Add a role `/roles`
- [x] `PUT`       Update role details `/roles/:id`
- [x] `DELETE`    Delete a role `/roles/:id`
- [ ] `GET`       List role sub-roles `/roles/:id/roles`
- [ ] `GET`       List role assignments `/roles/:id/assignments`
- [ ] `POST`      Add role assignment `/roles/:id/assignments`
- [ ] `DELETE`    Delete a role assignment `/roles/:id/assignments`
- [ ] `GET`       List role settings `/roles/:id/settings`
- [ ] `POST`      Add or update role setting `/roles/:id/settings`

### SearchResults
State: 2/2
- [x] `GET`       Perform a search `/searchResults`
- [x] `GET`       Perform a search using a specific field value `/searchResults/field`

### Stages
State: 7/7
- [x] `GET`       Get all stages `/stages`
- [x] `GET`       Get one stage `/stages/:id`
- [x] `GET`       Get deals in a stage `/stages/:id/deals`
- [x] `POST`      Add a new stage `/stages`
- [x] `PUT`       Update stage details `/stages/:id`
- [x] `DELETE`    Delete a stage `/stages/:id`
- [x] `DELETE`    Delete multiple stages in bulk `/stages`

### Users
State: 13/20
- [x] `GET`       Get all users `/users`
- [x] `GET`       Get one user `/users/:id`
- [x] `POST`      Add a new user `/users`
- [x] `PUT`       Update user details `/users/:id`
- [x] `GET`       List and filter activities assigned to a specific user `/users/:id/activities`
- [x] `GET`       List followers of a user `/users/:id/followers`
- [x] `GET`       List updates about and by a user `/users/:id/updates`
- [ ] `GET`       List permission set assignments `/users/:id/permissionSetAssignments`
- [ ] `POST`      Add permission set assignment `/users/:id/permissionSetAssignments`
- [ ] `DELETE`    Delete a permission set assignment `/users/:id/permissionSetAssignments`
- [ ] `GET`       List role assignments `/users/:id/roleAssignments`
- [ ] `POST`      Add role assignment `/users/:id/roleAssignments`
- [ ] `DELETE`    Delete a role assignment `/users/:id/roleAssignments`
- [ ] `GET`       List user role settings `/users/:id/roleSettings`
- [x] `GET`       List user permissions `/users/:id/permissions`
- [x] `GET`       List permitted items `/users/:id/permittedItems`
- [x] `GET`       Find users by name `/users/find`
- [x] `POST`      Add a new user `/users`
- [x] `GET`       List blacklisted email addresses of a user `/users/:id/blacklistedEmails`
- [x] `POST`      Add blacklisted email address for a user `/users/:id/blacklistedEmails`

### UserConnections
State: 1/1
- [x] `GET`       Get all user connections `/userConnections`

### UserSettings
State: 1/1
- [x] `GET`       List settings of authorized user `/userSettings`