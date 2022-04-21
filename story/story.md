### Actor Admin

## Admin can  manage(create,update,delete) food
## Admin can  manage(create,update,delete) types
## Admin can  manage(create,update,delete) client
## Admin can  manage(create,update,delete,print) bill
## Admin can  manage(create,update,delete) transaction
## Admin can  manage(create,update,delete) inventory
## Admin can  manage(create,update,delete) invoices
## Admin can  manage(create,update,delete) reports
## Admin can  manage(create,update,delete) shopping
## Admin can  manage(create,update,delete) users

### Actor Chief

### Chief can accept order in progress
#### when this senario happend we need:
#### service to debit from stock
#### service to add food to bill
#### service to calculate price depending on some factors

### Chief can pend   order in progress for wait
#### return message for user to wait


### Actor User
### user can order with choosing a table
### use can receive a message of his order