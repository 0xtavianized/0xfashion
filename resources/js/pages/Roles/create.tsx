import { addRole, storeRole } from '@/routes';
import { Input } from '@/components/ui/input';
import { Form, Head } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { useState } from 'react';

export default function CreateRole() {
    const [roleName, setRoleName] = useState('');
    return (
        <>
            <Head title="Add New Role" />

            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <Form {...storeRole()}>
                    {({ processing, errors }) => (
                        <>
                            <div className="mb-4">
                                <label htmlFor="name">Role Name</label>

                                <Input
                                    id="name"
                                    name="name"
                                    // value={roleName}
                                    placeholder="Enter role name"
                                />
                                <Input
                                    type="hidden"
                                    name="slug"
                                    value={roleName
                                        .toLowerCase()
                                        .replace(/\s+/g, '-')}
                                />

                                {errors.name && (
                                    <p className="text-sm text-red-500">
                                        {errors.name}
                                    </p>
                                )}
                            </div>

                            <Button type="submit" disabled={processing}>
                                {processing ? 'Saving...' : 'Save Role'}
                            </Button>
                        </>
                    )}
                </Form>
            </div>
        </>
    );
}

CreateRole.layout = {
    breadcrumbs: [
        {
            title: 'Add New Role',
            href: addRole(),
        },
    ],
};
