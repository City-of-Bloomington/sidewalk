select a.street_address_id,
       a.street_number_prefix || a.street_number || a.street_number_suffix || ' ' ||
       n.street_direction_code || n.street_name || n.street_type_suffix_code || n.post_direction_suffix_code as street
from gis.cen10_address_locations c
join ENG.address_location l on c.location_id=l.location_id
join eng.mast_address a on l.street_address_id=a.street_address_id
join eng.mast_street_names n on a.street_id=n.street_id
                            and (n.effective_start_date is null or n.effective_start_date < sysdate)
                            and (n.effective_end_date   is null or n.effective_end_date   > sysdate)
where c.cdbg_flag='Y'
  and a.gov_jur_id != 1;
