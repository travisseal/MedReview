use medreview;


delimiter //

create procedure getStats()


begin 

declare mostCommonZip varchar(50);
declare highestPriceForZip int;
declare mostExpensiveProcedure varchar(500);


set mostCommonZip = (
					select zipCode
					from userdata
					group by zipCode
					order by sum(zipCode) desc
					limit 1
					);
                    
set highestPriceForZip = (select max(price) 
						  from userdata
                          where zipCode = mostCommonZip
                          );
                          
set mostExpensiveProcedure = (
								select diagnosisDescription
                                from userdata
								where price = highestPriceForZip
                                limit 1
							);
select mostCommonZip, highestPriceForZip, mostExpensiveProcedure;

end //
delimiter ;