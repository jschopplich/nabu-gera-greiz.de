import path from 'path'
import fs from 'fs'
import fg from 'fast-glob'
import crypto from 'crypto'

const inputDir = 'public/assets'
const inputFiles = fg.sync(`${inputDir}/{css,js}/**/*.{css,js}`)

/**
 * Returns a 8-digit hash for a given file
 *
 * @param {string} path Path to the file
 * @returns {string} The generated hash
 */
function createHash (path) {
  const buffer = fs.readFileSync(path)
  const sum = crypto.createHash('sha256').update(buffer)
  const hex = sum.digest('hex')
  return hex.substr(0, 8)
}

for (const filePath of inputFiles) {
  const dirname = path.dirname(filePath)
  const extension = path.extname(filePath)
  let filename = path.basename(filePath)

  // Make sure file hasn't be renamed already or is a lazy rollup import
  if (/[.-]\w{8}\./g.test(filename)) continue

  filename = filename.substring(0, filename.indexOf(extension))
  const hash = createHash(filePath)
  const newFilePath = `${dirname}/${filename}.${hash}${extension}`
  fs.renameSync(filePath, newFilePath)
}
