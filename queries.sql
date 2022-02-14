-- to connect tenant and user table

SELECT * FROM users INNER JOIN tenant ON users.id = tenant.users_id WHERE users.status = 0;

-- to commect bills and tenant id

SELECT * FROM bills LEFT JOIN payments ON bills.bill_id = payments.bill_id;