# Upload Rules

## Security Guardrails for File Uploads

1. **Check upload errors** - Verify `$_FILES['file']['error']` is `UPLOAD_ERR_OK` to ensure the upload completed successfully.
2. **Validate MIME type (client hint)** - Check the MIME type reported by the browser against an allowlist (`image/jpeg`, `image/png`).
3. **Validate actual file MIME type** - Use `finfo_file()` to read the actual MIME type from the file contents (prevents fake extensions).
4. **Enforce file size limit** - Reject files larger than 2MB to prevent denial of service attacks.
5. **Rename files randomly** - Use `random_bytes()` to generate unpredictable filenames, preventing directory traversal and overwriting attacks.
6. **Restrict to exact types** - Only allow JPG and PNG, rejecting anything else.
7. **Store in dedicated directory** - Save uploads to a separate `/uploads` folder, not in executable directories.
8. **Use `move_uploaded_file()`** - This ensures the file was actually uploaded via HTTP POST.

## What could go wrong if these checks are removed:

- **No error check:** Could process corrupted/failed uploads
- **No MIME validation:** Attackers could upload PHP files disguised as images
- **No size limit:** Large files could fill disk space (DoS)
- **No renaming:** Predictable names allow overwriting and path traversal attacks
- **No restriction:** Any file type could be uploaded, including executable scripts
- **Wrong move function:** Using `copy()` could allow moving arbitrary files
