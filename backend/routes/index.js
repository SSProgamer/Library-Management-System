const express = require("express");
const pool = require("../config");
router = express.Router();
// const conn = pool.

router.get('/', async(res,req,next){
  console.log("Hi");
  return next;
});

// router.get()

exports.router = router