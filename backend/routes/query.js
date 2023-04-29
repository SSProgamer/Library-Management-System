const express = require("express");
const pool = require("../config");
router = express.Router();
// const conn = pool.

router.get('/', async(res,req,next){
  try{
    const [rows, column] = await pool.query("SELECT * FROM something");
    return res.json(rows);
  }catch(err){
    next(err)
  }
})

exports.router = router