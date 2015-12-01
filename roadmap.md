## Roadmap

### Activities
State: 0/6
- [ ] `GET`       Get all activities assigned to a particular user/activities
- [ ] `GET`       Get details of an activity/activities/:id
- [ ] `POST`      Add an activity/activities
- [ ] `PUT`       Edit an activity/activities/:id
- [ ] `DELETE`    Delete an activity/activities/:id
- [ ] `DELETE`    Delete multiple activities in bulk/activities

### ActivityTypes
State: 0/5
- [ ] `GET`       Get all activity types/activityTypes
- [ ] `POST`      Add new activity type/activityTypes
- [ ] `PUT`       Edit activity type/activityTypes/:id
- [ ] `DELETE`    Delete an activity type/activityTypes/:id
- [ ] `DELETE`    Delete multiple activity types in bulk/activityTypes

### Authorizations
State: 0/1
- [ ] `POST`      Get all authorizations for a user/authorizations

### Currencies
State: 0/1
- [ ] `GET`       Get all supported currencies/currencies

### Deals
State: 0/26
- [ ] `GET`       Get all deals/deals
- [ ] `GET`       Get details of a deal/deals/:id
- [ ] `POST`      Add a deal/deals
- [ ] `PUT`       Update a deal/deals/:id
- [ ] `DELETE`    Delete a deal/deals/:id
- [ ] `DELETE`    Delete multiple deals in bulk/deals
- [ ] `POST`      Duplicate deal/deals/:id/duplicate
- [ ] `PUT`       Merge two deals/deals/:id/merge
- [ ] `POST`      Add a follower to a deal/deals/:id/followers
- [ ] `GET`       List followers of a deal/deals/:id/followers
- [ ] `DELETE`    Delete a follower from a deal/deals/:id/followers/:follower_id
- [ ] `GET`       List products attached to a deal/deals/:id/products
- [ ] `POST`      Add a product to the deal, eventually creating a new item called a deal-product./deals/:id/products
- [ ] `PUT`       Update product attachment details of the deal-product (a product already attached to a deal)/deals/:id/products/:deal_product_id
- [ ] `DELETE`    Delete an attached product from a deal/deals/:id/products
- [ ] `GET`       List activities associated with a deal/deals/:id/activities
- [ ] `GET`       List updates about a deal/deals/:id/updates
- [ ] `POST`      Add a participant to a deal/deals/:id/participants
- [ ] `GET`       List participants of a deal/deals/:id/participants
- [ ] `DELETE`    Delete a participant from a deal/deals/:id/participants/:deal_participant_id
- [ ] `GET`       List files attached to a deal/deals/:id/files
- [ ] `GET`       List permitted users/deals/:id/permittedUsers
- [ ] `GET`       List e-mail messages associated with a deal/deals/:id/emailMessages
- [ ] `GET`       Find deals by name/deals/find
- [ ] `GET`       Get deals timeline/deals/timeline

### DealFields
State: 0/6
- [ ] `GET`       Get all deal fields/dealFields
- [ ] `GET`       Get one deal field/dealFields/:id
- [ ] `POST`      Add a new deal field/dealFields
- [ ] `PUT`       Update a deal field/dealFields/:id
- [ ] `DELETE`    Delete a deal field/dealFields/:id
- [ ] `DELETE`    Delete multiple deal fields in bulk/dealFields

### EmailMessages
State: 0/4
- [ ] `GET`       Get one e-mail message/emailMessages/:id
- [ ] `PUT`       Update e-mail message details/emailMessages/:id
- [ ] `DELETE`    Delete an e-mail message/emailMessages/:id
- [ ] `DELETE`    Delete multiple e-mail messages in bulk/emailMessages

### EmailThreads
State: 0/6
- [ ] `GET`       Get all e-mail message threads/emailThreads
- [ ] `GET`       Get one e-mail message thread/emailThreads/:id
- [ ] `PUT`       Update e-mail message thread details/emailThreads/:id
- [ ] `DELETE`    Delete an e-mail message thread/emailThreads/:id
- [ ] `DELETE`    Delete multiple e-mail message threads in bulk/emailThreads
- [ ] `GET`       List e-mail messages inside a thread/emailThreads/:id/messages

### Files
State: 0/8
- [ ] `GET`       Get all files/files
- [ ] `GET`       Get one file/files/:id
- [ ] `GET`       Download one file/files/:id/download
- [ ] `POST`      Add file(s)/files
- [ ] `POST`      Create a remote file and link it to an item/files/remote
- [ ] `POST`      Link a remote file to an item/files/remoteLink
- [ ] `PUT`       Update file details/files/:id
- [ ] `DELETE`    Delete a file/files/:id

### Filters
State: 0/6
- [ ] `GET`       Get all filters/filters
- [ ] `GET`       Get one filter/filters/:id
- [ ] `POST`      Add a new filter/filters
- [ ] `PUT`       Update filter/filters/:id
- [ ] `DELETE`    Delete a filter/filters/:id
- [ ] `DELETE`    Delete multiple filters in bulk/filters

### GlobalMessages
State: 0/2
- [ ] `GET`       Get global messages/globalMessages
- [ ] `DELETE`    Dismiss a global message/globalMessages/:id

### Goals
State: 0/6
- [ ] `GET`       Get all goals/goals
- [ ] `GET`       Get details of a goal/goals/:id
- [ ] `POST`      Add a new goal/goals
- [ ] `PUT`       Update goal details/goals/:id
- [ ] `DELETE`    Delete existing goal/goals/:id
- [ ] `GET`       Get results of one goal/goals/:id/results

### Notes
State: 0/5
- [ ] `GET`       Get all notes/notes
- [ ] `GET`       Get one note/notes/:id
- [ ] `POST`      Add a note/notes
- [ ] `PUT`       Update a note/notes/:id
- [ ] `DELETE`    Delete a note/notes/:id

### OrganizationFields
State: 0/6
- [ ] `GET`       Get all organization fields/organizationFields
- [ ] `GET`       Get one organization field/organizationFields/:id
- [ ] `POST`      Add a new organization field/organizationFields
- [ ] `PUT`       Update an organization field/organizationFields/:id
- [ ] `DELETE`    Delete an organization field/organizationFields/:id
- [ ] `DELETE`    Delete multiple organization fields in bulk/organizationFields

### Organizations
State: 3/19
- [x] `GET`       Get all organizations/organizations
- [x] `GET`       Get details of an organization/organizations/:id
- [ ] `POST`      Add an organization/organizations
- [ ] `PUT`       Update an organization/organizations/:id
- [ ] `DELETE`    Delete an organization/organizations/:id
- [ ] `DELETE`    Delete multiple organizations in bulk/organizations
- [ ] `GET`       List files attached to an organization/organizations/:id/files
- [ ] `GET`       List e-mail messages associated with an organization/organizations/:id/emailMessages
- [ ] `POST`      Add a follower to an organization/organizations/:id/followers
- [ ] `GET`       List followers of an organization/organizations/:id/followers
- [ ] `DELETE`    Delete a follower from an organization/organizations/:id/followers/:follower_id
- [ ] `GET`       List persons of an organization/organizations/:id/persons
- [ ] `GET`       List deals associated with an organization/organizations/:id/deals
- [ ] `GET`       List activities associated with an organization/organizations/:id/activities
- [ ] `GET`       List updates about an organization/organizations/:id/updates
- [ ] `GET`       List permitted users/organizations/:id/permittedUsers
- [ ] `PUT`       Merge two organizations/organizations/:id/merge
- [x] `GET`       Find organizations by name/organizations/find

### Organization Relationships
State: 0/5
- [ ] `GET`       Get all relationships for organization/organizationRelationships
- [ ] `GET`       Get one organization relationship/organizationRelationships/:id
- [ ] `POST`      Create an organization relationship/organizationRelationships
- [ ] `PUT`       Update an organization relationship/organizationRelationships/:id
- [ ] `DELETE`    Delete an organization relationship/organizationRelationships/:id

### PermissionSets
State: 0/6
- [ ] `GET`       Get all permission sets/permissionSets
- [ ] `GET`       Get one permission set/permissionSets/:id
- [ ] `PUT`       Update permission set details/permissionSets/:id
- [ ] `GET`       List permission set assignments/permissionSets/:id/assignments
- [ ] `POST`      Add permission set assignment/permissionSets/:id/assignments
- [ ] `DELETE`    Delete a permission set assignment/permissionSets/:id/assignments

### Persons
State: 0/20
- [ ] `GET`       Get all persons/persons
- [ ] `GET`       Get details of a person/persons/:id
- [ ] `POST`      Add a person/persons
- [ ] `PUT`       Update a person/persons/:id
- [ ] `DELETE`    Delete a person/persons/:id
- [ ] `DELETE`    Delete multiple persons in bulk/persons
- [ ] `GET`       List files attached to a person/persons/:id/files
- [ ] `GET`       List e-mail messages associated with a person/persons/:id/emailMessages
- [ ] `POST`      Add a follower to a person/persons/:id/followers
- [ ] `GET`       List followers of a person/persons/:id/followers
- [ ] `DELETE`    Delete a follower from a person/persons/:id/followers/:follower_id
- [ ] `GET`       List products associated with a person/persons/:id/products
- [ ] `GET`       List deals associated with a person/persons/:id/deals
- [ ] `GET`       List updates about a person/persons/:id/updates
- [ ] `GET`       List activities associated with a person/persons/:id/activities
- [ ] `GET`       List permitted users/persons/:id/permittedUsers
- [ ] `PUT`       Merge two persons/persons/:id/merge
- [ ] `GET`       Find persons by name/persons/find
- [ ] `POST`      Add person picture/persons/:id/picture
- [ ] `POST`      Delete person picture/persons/:id/picture

### PersonFields
State: 0/6
- [ ] `GET`       Get all person fields/personFields
- [ ] `GET`       Get one person field/personFields/:id
- [ ] `POST`      Add a new person field/personFields
- [ ] `PUT`       Update a person field/personFields/:id
- [ ] `DELETE`    Delete a person field/personFields/:id
- [ ] `DELETE`    Delete multiple person fields in bulk/personFields

### Pipelines
State: 0/8
- [ ] `GET`       Get all pipelines/pipelines
- [ ] `GET`       Get one pipeline/pipelines/:id
- [ ] `POST`      Add a new pipeline/pipelines
- [ ] `PUT`       Edit a pipeline/pipelines/:id
- [ ] `GET`       Get deals in a pipeline/pipelines/:id/deals
- [ ] `DELETE`    Delete a pipeline/pipelines/:id
- [ ] `GET`       Get deals conversion rates in pipeline/pipelines/:id/conversion_statistics
- [ ] `GET`       Get deals movements in pipeline/pipelines/:id/movement_statistics

### Products
State: 0/9
- [ ] `GET`       Get all products/products
- [ ] `GET`       Get one product/products/:id
- [ ] `GET`       Get deals where a product is attached to/products/:id/deals
- [ ] `POST`      Add a product/products
- [ ] `PUT`       Update a product/products/:id
- [ ] `DELETE`    Delete a product/products/:id
- [ ] `GET`       List files attached to a product/products/:id/files
- [ ] `GET`       List permitted users/products/:id/permittedUsers
- [ ] `GET`       Find products by name/products/find

### ProductFields
State: 0/6
- [ ] `GET`       Get all product fields/productFields
- [ ] `GET`       Get one product field/productFields/:id
- [ ] `POST`      Add a new product field/productFields
- [ ] `PUT`       Update a product field/productFields/:id
- [ ] `DELETE`    Delete a product field/productFields/:id
- [ ] `DELETE`    Delete multiple product fields in bulk/productFields

### PushNotifications
State: 0/4
- [ ] `GET`       Get all subscriptions/pushNotifications
- [ ] `GET`       Get details of a subscription/pushNotifications/:id
- [ ] `POST`      Create new subscription/pushNotifications
- [ ] `DELETE`    Delete existing subscription/pushNotifications/:id

### Recents
State: 0/1
- [ ] `GET`       Get recents/recents

### Roles
State: 0/11
- [ ] `GET`       Get all roles/roles
- [ ] `GET`       Get one role/roles/:id
- [ ] `POST`      Add a role/roles
- [ ] `PUT`       Update role details/roles/:id
- [ ] `DELETE`    Delete a role/roles/:id
- [ ] `GET`       List role sub-roles/roles/:id/roles
- [ ] `GET`       List role assignments/roles/:id/assignments
- [ ] `POST`      Add role assignment/roles/:id/assignments
- [ ] `DELETE`    Delete a role assignment/roles/:id/assignments
- [ ] `GET`       List role settings/roles/:id/settings
- [ ] `POST`      Add or update role setting/roles/:id/settings

### SearchResults
State: 0/2
- [ ] `GET`       Perform a search/searchResults
- [ ] `GET`       Perform a search using a specific field value/searchResults/field

### Stages
State: 0/7
- [ ] `GET`       Get all stages/stages
- [ ] `GET`       Get one stage/stages/:id
- [ ] `GET`       Get deals in a stage/stages/:id/deals
- [ ] `POST`      Add a new stage/stages
- [ ] `PUT`       Update stage details/stages/:id
- [ ] `DELETE`    Delete a stage/stages/:id
- [ ] `DELETE`    Delete multiple stages in bulk/stages

### Users
State: 0/20
- [ ] `GET`       Get all users/users
- [ ] `GET`       Get one user/users/:id
- [ ] `POST`      Add a new user/users
- [ ] `PUT`       Update user details/users/:id
- [ ] `GET`       List and filter activities assigned to a specific user/users/:id/activities
- [ ] `GET`       List followers of a user/users/:id/followers
- [ ] `GET`       List updates about and by a user/users/:id/updates
- [ ] `GET`       List permission set assignments/users/:id/permissionSetAssignments
- [ ] `POST`      Add permission set assignment/users/:id/permissionSetAssignments
- [ ] `DELETE`    Delete a permission set assignment/users/:id/permissionSetAssignments
- [ ] `GET`       List role assignments/users/:id/roleAssignments
- [ ] `POST`      Add role assignment/users/:id/roleAssignments
- [ ] `DELETE`    Delete a role assignment/users/:id/roleAssignments
- [ ] `GET`       List user role settings/users/:id/roleSettings
- [ ] `GET`       List user permissions/users/:id/permissions
- [ ] `GET`       List permitted items/users/:id/permittedItems
- [ ] `GET`       Find users by name/users/find
- [ ] `POST`      Add a new user/users
- [ ] `GET`       List blacklisted email addresses of a user/users/:id/blacklistedEmails
- [ ] `POST`      Add blacklisted email address for a user/users/:id/blacklistedEmails

### UserConnections
State: 0/1
- [ ] `GET`       Get all user connections/userConnections

### UserSettings
State: 0/1
- [ ] `GET`       List settings of authorized user/userSettings