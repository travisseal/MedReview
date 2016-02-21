select *
from facilities;



ALTER TABLE facilities
  CHANGE COLUMN city address2
    VARCHAR (255)