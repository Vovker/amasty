
select * from transactions where transaction_id =
                                 (
                                     select transaction_id from (SELECT transactions.transaction_id, transactions.from_person_id as person from transactions UNION
                                                                 SELECT transactions.transaction_id, transactions.to_person_id as person from transactions) as tabl1
                                                                    inner join persons on tabl1.person=persons.id
                                                                    inner join cities on persons.city_id = cities.id group by transaction_id, city_id HAVING COUNT(*) > 1
                                 )


